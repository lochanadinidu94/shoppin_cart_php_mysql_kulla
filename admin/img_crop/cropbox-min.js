"use strict";
! function (t) {
  "function" == typeof define && define.amd ? define(["jquery"], t) : t(jQuery)
}(function (t) {
  var e = function (e, n) {
    var n = n || t(e.imageBox),
      i = {
        state: {},
        ratio: 1,
        options: e,
        imageBox: n,
        thumbBox: n.find(e.thumbBox),
        spinner: n.find(e.spinner),
        image: new Image,
        getDataURL: function () {
          var t = this.thumbBox.width(),
            e = this.thumbBox.height(),
            i = document.createElement("canvas"),
            a = n.css("background-position").split(" "),
            o = n.css("background-size").split(" "),
            s = parseInt(a[0]) - n.width() / 2 + t / 2,
            r = parseInt(a[1]) - n.height() / 2 + e / 2,
            u = parseInt(o[0]),
            g = parseInt(o[1]),
            c = parseInt(this.image.height),
            m = parseInt(this.image.width);
          i.width = t, i.height = e;
          var p = i.getContext("2d");
          p.drawImage(this.image, 0, 0, m, c, s, r, u, g);
          var d = i.toDataURL("image/png");
          return d
        },
        getBlob: function () {
          for (var t = this.getDataURL(), e = t.replace("data:image/png;base64,", ""), n = atob(e), i = [], a = 0; a < n.length; a++) i.push(n.charCodeAt(a));
          return new Blob([new Uint8Array(i)], {
            type: "image/png"
          })
        },
        zoomIn: function () {
          this.ratio *= 1.1, a()
        },
        zoomOut: function () {
          this.ratio *= .9, a()
        }
      },
      a = function () {
        var t = parseInt(i.image.width) * i.ratio,
          e = parseInt(i.image.height) * i.ratio,
          a = (n.width() - t) / 2,
          o = (n.height() - e) / 2;
        n.css({
          "background-image": "url(" + i.image.src + ")",
          "background-size": t + "px " + e + "px",
          "background-position": a + "px " + o + "px",
          "background-repeat": "no-repeat"
        })
      },
      o = function (t) {
        t.stopImmediatePropagation(), i.state.dragable = !0, i.state.mouseX = t.clientX, i.state.mouseY = t.clientY
      },
      s = function (t) {
        if (t.stopImmediatePropagation(), i.state.dragable) {
          var e = t.clientX - i.state.mouseX,
            a = t.clientY - i.state.mouseY,
            o = n.css("background-position").split(" "),
            s = e + parseInt(o[0]),
            r = a + parseInt(o[1]);
          n.css("background-position", s + "px " + r + "px"), i.state.mouseX = t.clientX, i.state.mouseY = t.clientY
        }
      },
      r = function (t) {
        t.stopImmediatePropagation(), i.state.dragable = !1
      },
      u = function (t) {
        i.ratio *= t.originalEvent.wheelDelta > 0 || t.originalEvent.detail < 0 ? 1.1 : .9, a()
      };
    return i.spinner.show(), i.image.onload = function () {
      i.spinner.hide(), a(), n.bind("mousedown", o), n.bind("mousemove", s), t(window).bind("mouseup", r), n.bind("mousewheel DOMMouseScroll", u)
    }, i.image.src = e.imgSrc, n.on("remove", function () {
      t(window).unbind("mouseup", r)
    }), i
  };
  jQuery.fn.cropbox = function (t) {
    return new e(t, this)
  }
});