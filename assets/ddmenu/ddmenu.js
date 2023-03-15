var ddmenuOptions = {
	menuId: "ddmenu",
    linkIdToMenuHtml: null,
    open: "onmouseover", // or "onclick"
    delay: 50,
    speed: 400,
    keysNav: true,
    singleOpen: false,
    license: "6c0l68"
};

var ddmenu = new Ddmenu(ddmenuOptions);

/* Menucool Drop Down Menu v2017.3.17 Copyright www.menucool.com */
function Ddmenu(j) {
    "use strict";
    
	var r = function(a, b) {
            return a.getElementsByTagName(b)
        },
        q = navigator,
        H = function(a, c) {
            if (typeof getComputedStyle != "undefined") var b = getComputedStyle(a, null);
            else if (a.currentStyle) b = a.currentStyle;
            else b = a.style;
            return b[c]
        },
        s = function(a) {
            if (a && a.stopPropagation) a.stopPropagation();
            else if (window.event) window.event.cancelBubble = true
        },
        hb = function(b) {
            var a = b ? b : window.event;
            if (a.preventDefault) a.preventDefault();
            else if (a) a.returnValue = false
        },
        i, b, w, g = document,
        n = "className",
        a = "length",
        B = "addEventListener",
        nb = ["$1$2$3", "$1$2$3", "$1$24", "$1$23", "$1$22"],
        D = "offsetWidth",
        E = "zIndex",
        m = "onclick",
        c = [],
        y = -1,
        l = 0,
        I = 0,
        K = function(a) {
            if (l) l[b][w] = a ? "block" : "none"
        },
        d, pb, e, h = function() {
            return e && e[D]
        },
        k = function(a, c, b) {
            if (a[B]) a[B](c, b, false);
            else a.attachEvent && a.attachEvent("on" + c, b)
        },
        G = function(c, e) {
            var a = c.dd;
            if (h() && a)
                if (e) {
                    C(c, "over");
                    a[b].height = "auto";
                    var f = a.offsetHeight + "px";
                    a[b].height = "0px";
                    setTimeout(function() {
                        a[b].transition = "height " + d.f / 2 + "ms";
                        a[b].height = f
                    }, 0)
                } else {
                    a[b].height = "0px";
                    setTimeout(function() {
                        A(c, "over")
                    }, d.f / 2)
                } else {
                e ? C(c, "over") : A(c, "over");
                if (a) {
                    a[b].transition = "none";
                    a[b].height = "auto"
                }
            }
            c[b][E] = e ? 2 : 1
        },
        db = "ontouchstart" in window || window.DocumentTouch && document instanceof DocumentTouch,
        U = (q.msPointerEnabled || q.pointerEnabled) && (q.msMaxTouchPoints || q.maxTouchPoints);
    if (U)
        if (q.msPointerEnabled) var Q = "MSPointerOver",
            R = "MSPointerOut";
        else {
            Q = "pointerover";
            R = "pointerout"
        }
    var p = function(d) {
            for (var c = r(g, "li"), b = 0, e = c[a]; b < e; b++)
                if (f(c[b], "over")) d != c[b] && G(c[b], 0);
            K(d)
        },
        mb = [/(?:.*\.)?(\w)([\w\-])[^.]*(\w)\.[^.]+$/, /.*([\w\-])\.(\w)(\w)\.[^.]+$/, /^(?:.*\.)?(\w)(\w)\.[^.]+$/, /.*([\w\-])([\w\-])\.com\.[^.]+$/, /^(\w)[^.]*(\w)$/],
        ob = function(a) {
            return a.replace(/(?:.*\.)?(\w)([\w\-])?[^.]*(\w)\.[^.]*$/, "$1$3$2")
        },
        fb = function() {
            var c = 50,
                b = q.userAgent,
                a;
            if ((a = b.indexOf("MSIE ")) != -1) c = parseInt(b.substring(a + 5, b.indexOf(".", a)));
            return c
        },
        Y = function() {
            d = {
                a: j.license,
                b: j.menuId,
                d: j.delay,
                e: j.linkIdToMenuHtml,
                f: j.speed,
                g: j.open.toLowerCase(),
                h: j.keysNav
            }
        },
        t = fb(),
        z = function(e) {
            var b = e.childNodes,
                d = [];
            if (b)
                for (var c = 0, f = b[a]; c < f; c++) b[c].nodeType == 1 && d.push(b[c]);
            return d
        },
        v = "createElement",
        jb = function(g, b) {
            var d = function(b) {
                    for (var d = unescape(b.substr(0, b[a] - 1)), f = b.substr(b[a] - 1, 1), e = "", c = 0; c < d[a]; c++) e += String.fromCharCode(d.charCodeAt(c) - f);
                    return unescape(e)
                },
                c = Math.random(),
                e = d(ob(document.domain)),
                f = "%66%75%6E%63%74%69%6F%6E%20%71%51%28%73%2C%6B%29%7B%76%3";
            if (N(b + c)[a] % (e[a] + 1) > 8) try {
                b = (new Function("$", "_", "e", "a", "b", "c", N(f, c[a]))).apply(this, [e, b, c, d, g, v])
            } catch (h) {}
        },
        o = function(a, b) {
            return b ? g[a](b) : g[a]
        },
        N = function(e, b) {
            for (var d = [], c = 0; c < e[a]; c++) d[d[a]] = String.fromCharCode(e.charCodeAt(c) - (b && b > 7 ? b : 3));
            return d.join("")
        },
        ib = function(b, d) {
            var c = b[a];
            while (c--)
                if (b[c] === d) return true;
            return false
        },
        f = function(a, c) {
            var b = false;
            if (a[n]) b = ib(a[n].split(" "), c);
            return b
        },
        C = function(a, b) {
            if (!f(a, b))
                if (a[n] == "") a[n] = b;
                else a[n] += " " + b
        },
        A = function(d, f) {
            if (d[n]) {
                for (var e = "", c = d[n].split(" "), b = 0, g = c[a]; b < g; b++)
                    if (c[b] !== f) e += c[b] + " ";
                d[n] = e.replace(/^\s+|\s+$/g, "")
            }
        },
        Z = function(d) {
            if (!h())
                for (var b = 0, e = c[a]; b < e; b++)
                    if (d != c[b].a && f(c[b].a, "over")) return 1;
            return 0
        },
        O = function(a) {
            return a.pointerType == a.MSPOINTER_TYPE_MOUSE || a.pointerType == "mouse"
        },
        T = function(b) {
            var a = this;
            a.a = b;
            a.b = null;
            a.k()
        },
        W = function(a) {
            this.a(a);
            this.b(a)
        };
    T.prototype = {
        l: function(b) {
            var a = this;
            clearTimeout(a.b);
            if (b) {
                a.f();
                K(1)
            } else a.b = setTimeout(function() {
                a.f()
            }, Z(a.a) ? 0 : d.d)
        },
        f: function() {
            G(this.a, 1);
            if (!h() && H(this.a, "position") == "static") this.a.dd[b].top = this.a.offsetTop + this.a.offsetHeight + "px";
            else this.a.dd[b].top = "";
            this.a.dd[b].marginTop = "-1.1px"
        },
        g: function() {
            var a = this;
            clearTimeout(a.b);
            a.b = setTimeout(function() {
                G(a.a, 0)
            }, d.d + 50)
        },
        i: function(g) {
            if (t < 9) {
                var c = z(g),
                    d = c[a];
                if (d) {
                    c = z(c[0]);
                    d = c[a];
                    if (d) {
                        var e = c[d - 1];
                        if (f(e, "column")) e[b].borderRight = "none"
                    }
                }
            }
        },
        j: function(b) {
            var a = this;
            s(b);
            if (f(a.a, "over")) {
                a.g();
                !h() && K(0)
            } else a.c(b)
        },
        k: function() {
            var e = this,
                c = this.a,
                g = z(c),
                j = g[a];
            if (t < 7)
                if (f(g[0], "top-heading")) g[0][b].zoom = 1;
            while (j--)
                if (f(g[j], "dropdown")) var i = g[j];
            if (i) {
				
                f(g[0], "top-heading") && g[0].setAttribute("aria-haspopup", "true");
                e.i(i);
                c.dd = i;
                c.setAttribute("tabindex", 0);
                if (f(c, "full-width")) i[b][E] = 96;
                k(i, "click", s);
                k(i, "contextmenu", function() {
                    I = 1;
                    setTimeout(function() {
                        I = 0
                    }, 500)
                });
                if (d.g == m) c[m] = function(a) {
                    e.j(a)
                };
                else if (U) {
				
                    c[m] = function(a) {
                        if (h()) e.j(a);
                        else s(a)
                    };
                    k(c, Q, function(a) {
                        if (!h())
                            if (O(a)) e.l(a);
                            else {
                                s(a);
                                e.c(a)
                            }
                    });
                    k(c, R, function(a) {
                        !h() && O(a) && e.g()
                    })
                } else {
		
                    c[m] = function(a) {
                        e.j(a)
                    };
                    c.onmouseover = function() {
                        !h() && !l && e.l(0)
                    };
                    c.onmouseout = function() {
                        !I && !h() && !l && e.g()
                    }
                }
            } else {
				
                c.onmouseover = function() {
                    C(this, "over")
                };
                c.onmouseout = function() {
                    A(this, "over")
                }
            }
        },
        c: function() {
            (!h() || j.singleOpen) && p(this.a);
            this.l(1)
        }
    };
    W.prototype = {
        a: function(a) {
            jb(a, d.a)
        },
        b: function(m) {
            if (db && /(iPad|iPhone|iPod)/g.test(q.userAgent)) {
                l = o(v, "div");
                m.insertBefore(l, m.childNodes[0]);
                var f = l[b];
                f.position = "fixed";
                f.left = f.right = f.bottom = f.top = "0px";
                f[w] = "none";
                f[E] = -1
            }
            if (!J) {
                k(g, "click", function() {
                    p(0)
                });
                k(window, "resize", function() {
                    var a = h();
                    if (y != a)
                        if (y == -1) y = a;
                        else {
                            y = a;
                            p(0)
                        }
                })
            }
            for (var r = z(m), n = 0, s = r[a]; n < s; n++) r[n].nodeName == "LI" && c.push(new T(r[n]));
            (new Function("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", function(d) {
                for (var c = [], b = 0, e = d[a]; b < e; b++) c[c[a]] = String.fromCharCode(d.charCodeAt(b) - 4);
                return c.join("")
            }(""))).apply(this, [d, l, N, mb, h, e, o, nb, m, 0, i]);
            !J && d.h && j.license[a] == 6 && k(g, "keydown", bb);
            ab(m)
        }
    };
    var eb = function() {
        var c = r(g, "head");
        if (c[a]) {
            var b = o(v, "style");
            c[0].appendChild(b);
            return b.sheet ? b.sheet : b.styleSheet
        } else return 0
    };

    function ab(f) {
        if (typeof f[b].webkitAnimationName != "undefined") var e = "-webkit-";
        else if (typeof f[b].animationName != "undefined") e = "";
        else return;
        var h = "@" + e + "keyframes ddFadeIn {from{opacity:0;} to{opacity:1;}}",
            i = "#" + d.b + " li.over .dropdown {" + e + "animation: ddFadeIn " + d.f + "ms;}";
        if (g.styleSheets && g.styleSheets[a]) {
            var c = eb();
            if (c && c.insertRule) {
                c.insertRule(i, 0);
                c.insertRule(h, 0)
            }
        }
    }
    var P;

    function bb(b) {
        var j = b.which || b.keyCode;
        if (!/^(37|38|39|40|27|9)$/.test(j)) return;
        var h = g.activeElement;
        if (h == e && t > 8 && j == 9 && b.shiftKey) {
            x();
            return
        }
        for (var d = 0; d < c[a]; d++)
            if (h == e || h == c[d].a || f(c[d].a, "over") || h[i] == c[d].a) {
                if (j != 9) {
                    hb(b);
                    s(b)
                }
                break
            }
        clearTimeout(P);
        P = setTimeout(function() {
            kb(b, j)
        }, 10)
    }

    function u(c, b, e) {
        b = b + e;
        if (b < 0) b = c[a] - 1;
        if (b >= c[a]) b = 0;
        if (c[b].a.getAttribute("tabindex") != null) {
            c[b].a.focus();
            F(c[b], c[b].a)
        } else {
            var d = r(c[b].a, "a");
            if (d[a]) {
                d[0].focus();
                F(c[b], c[b].a)
            } else u(c, b, e)
        }
    }

    function cb(b, a) {
        return !a || a.nodeType != 1 ? 0 : a[i] == b ? 1 : a[i] && a[i][i] == b ? 1 : 0
    }

    function F(a) {
        p(0);
        a.l(1)
    }

    function x() {
        f(e, "menu-icon-active") && e[m]()
    }

    function kb(s, b) {
        var d = g.activeElement;
        if (d == e) {
            if (b == 9) !f(e, "menu-icon-active") && e[m]();
            if (b == 27) {
                x();
                e.blur()
            }
            b == 40 && u(c, -1, 1);
            return
        }
        var h = -1;
        if (d)
            for (var l = 0; l < c[a]; l++)
                if (d == c[l].a || f(c[l].a, "over") || d[i] == c[l].a) {
                    h = l;
                    break
                }
        if (h != -1) {
            var k = c[h].a;
            if (b == 27) {
                p(0);
                k.blur();
                x();
                return
            }
            if (b == 37) u(c, h, -1);
            else if (b == 39) u(c, h, 1);
            else {
                var n = r(k, "a"),
                    j = -1;
                if (!n[a]) return;
                for (var o = 0; o < n[a]; o++)
                    if (d == n[o]) {
                        j = o;
                        break
                    }
                if (b == 38) j--;
                else if (b == 40 && j < n[a] - 1) j++;
                else if (b == 9) {
                    if (d && !f(k, "over")) F(c[h], k);
                    else if (j == -1 && d != k)
                        if (cb(k[i], d)) {
                            if (t < 9) var q = 1;
                            else q = s.shiftKey ? -1 : 1;
                            u(c, h, q)
                        } else {
                            p(0);
                            x()
                        }
                    return
                }
                j >= 0 && n[j].focus()
            }
        }
    }
    var X = function(c) {
            var a;
            if (window.XMLHttpRequest) a = new XMLHttpRequest;
            else a = new ActiveXObject("Microsoft.XMLHTTP");
            a.onreadystatechange = function() {
                if (a.readyState == 4 && a.status == 200) {
                    var e = a.responseText,
                        f = /^[\s\S]*<body[^>]*>([\s\S]+)<\/body>[\s\S]*$/i;
                    if (f.test(e)) e = e.replace(f, "$1");
                    var d = o(v, "div");
                    d[b].padding = d[b].margin = "0";
                    c[i].insertBefore(d, c);
                    d.innerHTML = e;
                    c[b][w] = "none";
                    S()
                }
            };
            a.open("GET", c.href, true);
            a.send()
        },
        M = function() {
            i = "parentNode", b = "style", w = "display";
            if (d.e) {
                var a = o("getElementById", d.e);
                if (a) X(a);
                else alert('Cannot find the anchor (id="' + d.e + '")')
            } else S()
        },
        L = 0,
        J = 0,
        S = function() {
            if (!L) {
                var c = o("getElementById", d.b);
                if (c) {
                    for (var i = r(c, "*"), h = 0; h < i[a]; h++)
                        if (f(i[h], "menu-icon")) {
                            e = i[h];
                            break
                        }
                    c = r(c, "ul");
                    if (c[a]) {
                        c = c[0];
                        if (e) {
                            if (t < 9 && e[D]) d.g = m;
                            e[m] = function(a) {
                                c[b][w] = c[D] == 0 ? "block" : "";
                                if (c[D] == 0) {
                                    p(0);
                                    A(this, "menu-icon-active")
                                } else C(this, "menu-icon-active");
                                s(a)
                            };
                            var g = H(c, "z-index") || H(c, E);
                            if (g == "auto" || g == "") g = 1e10;
                            c.zix = g;
                            e.setAttribute("tabindex", 0)
                        }
                        new W(c);
                        L = J = 1
                    }
                }
            }
        },
        gb = function(c) {
            var a = 0;

            function b() {
                if (a) return;
                a = 1;
                setTimeout(c, 4)
            }
            if (g[B]) g[B]("DOMContentLoaded", b, false);
            else k(window, "load", b)
        };
    if (t < 9) {
        var lb = o(v, "nav"),
            V = r(g, "head");
        if (!V[a]) return;
        V[0].appendChild(lb)
    }
    Y();
    if (o("getElementById", d.b)) M();
    else gb(M);
    return {
        init: function() {
            L = 0;
            M()
        }
    }
}