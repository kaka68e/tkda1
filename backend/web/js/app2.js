var uiLoad = uiLoad || {};
! function(a, b, c) {
    "use strict";
    var d = [],
        e = !1,
        f = a.Deferred();
    c.load = function(b) {
        return b = a.isArray(b) ? b : b.split(/\s+/), e || (e = f.promise()), a.each(b, function(a, b) {
            e = e.then(function() {
                return b.indexOf(".css") >= 0 ? h(b) : g(b)
            })
        }), f.resolve(), e
    };
    var g = function(c) {
            if (d[c]) return d[c].promise();
            var e = a.Deferred(),
                f = b.createElement("script");
            return f.src = c, f.onload = function(a) {
                e.resolve(a)
            }, f.onerror = function(a) {
                e.reject(a)
            }, b.body.appendChild(f), d[c] = e, e.promise()
        },
        h = function(c) {
            if (d[c]) return d[c].promise();
            var e = a.Deferred(),
                f = b.createElement("link");
            return f.rel = "stylesheet", f.type = "text/css", f.href = c, f.onload = function(a) {
                e.resolve(a)
            }, f.onerror = function(a) {
                e.reject(a)
            }, b.head.appendChild(f), d[c] = e, e.promise()
        }
}(jQuery, document, uiLoad), + function(a) {
    a(function() {
        a(document).on("click", "[ui-nav] a", function(b) {
            var c, d = a(b.target);
            d.is("a") || (d = d.closest("a")), c = d.parent().siblings(".active"), c && c.toggleClass("active").find("> ul:visible").slideUp(200), d.parent().hasClass("active") && d.next().slideUp(200) || d.next().slideDown(200), d.parent().toggleClass("active"), d.next().is("ul") && b.preventDefault()
        })
    })
}(jQuery), + function(a) {
    a(function() {
        a(document).on("click", "[ui-toggle-class]", function(b) {
            b.preventDefault();
            var c = a(b.target);
            c.attr("ui-toggle-class") || (c = c.closest("[ui-toggle-class]"));
            var d = c.attr("ui-toggle-class").split(","),
                e = c.attr("target") && c.attr("target").split(",") || Array(c),
                f = 0;
            a.each(d, function(b, c) {
                var g = e[e.length && f];
                a(g).toggleClass(d[b]), f++
            }), c.toggleClass("active")
        })
    })
}(jQuery);


function (b) {
    if (/(38|40|27|32)/.test(b.which) && !/input|textarea/i.test(b.target.tagName)) {
        var d = a(this);
        if (b.preventDefault(), b.stopPropagation(), !d.is(".disabled, :disabled")) {
            var e = c(d),
                g = e.hasClass("open");
            if (!g && 27 != b.which || g && 27 == b.which) return 27 == b.which && e.find(f).trigger("focus"), d.trigger("click");
            var h = " li:not(.disabled):visible a",
                i = e.find('[role="menu"]' + h + ', [role="listbox"]' + h);
            if (i.length) {
                var j = i.index(b.target);
                38 == b.which && j > 0 && j--, 40 == b.which && j < i.length - 1 && j++, ~j || (j = 0), i.eq(j).trigger("focus")
            }
        }
    }
}