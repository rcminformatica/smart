/*<script>*/
/* jquery-1.3.2.min.js */
(function () {
    var l = this,
        g, y = l.jQuery,
        p = l.$,
        o = l.jQuery = l.$ = function (E, F) {
            return new o.fn.init(E, F)
        },
        D = /^[^<]*(<(.|\s)+>)[^>]*$|^#([\w-]+)$/,
        f = /^.[^:#\[\.,]*$/;
    o.fn = o.prototype = {
        init: function (E, H) {
            E = E || document;
            if (E.nodeType) {
                this[0] = E;
                this.length = 1;
                this.context = E;
                return this
            }
            if (typeof E === "string") {
                var G = D.exec(E);
                if (G && (G[1] || !H)) {
                    if (G[1]) {
                        E = o.clean([G[1]], H)
                    } else {
                        var I = document.getElementById(G[3]);
                        if (I && I.id != G[3]) {
                            return o().find(E)
                        }
                        var F = o(I || []);
                        F.context = document;
                        F.selector = E;
                        return F
                    }
                } else {
                    return o(H).find(E)
                }
            } else {
                if (o.isFunction(E)) {
                    return o(document).ready(E)
                }
            }
            if (E.selector && E.context) {
                this.selector = E.selector;
                this.context = E.context
            }
            return this.setArray(o.isArray(E) ? E : o.makeArray(E))
        },
        selector: "",
        jquery: "1.3.2",
        size: function () {
            return this.length
        },
        get: function (E) {
            return E === g ? Array.prototype.slice.call(this) : this[E]
        },
        pushStack: function (F, H, E) {
            var G = o(F);
            G.prevObject = this;
            G.context = this.context;
            if (H === "find") {
                G.selector = this.selector + (this.selector ? " " : "") + E
            } else {
                if (H) {
                    G.selector = this.selector + "." + H + "(" + E + ")"
                }
            }
            return G
        },
        setArray: function (E) {
            this.length = 0;
            Array.prototype.push.apply(this, E);
            return this
        },
        each: function (F, E) {
            return o.each(this, F, E)
        },
        index: function (E) {
            return o.inArray(E && E.jquery ? E[0] : E, this)
        },
        attr: function (F, H, G) {
            var E = F;
            if (typeof F === "string") {
                if (H === g) {
                    return this[0] && o[G || "attr"](this[0], F)
                } else {
                    E = {};
                    E[F] = H
                }
            }
            return this.each(function (I) {
                for (F in E) {
                    o.attr(G ? this.style : this, F, o.prop(this, E[F], G, I, F))
                }
            })
        },
        css: function (E, F) {
            if ((E == "width" || E == "height") && parseFloat(F) < 0) {
                F = g
            }
            return this.attr(E, F, "curCSS")
        },
        text: function (F) {
            if (typeof F !== "object" && F != null) {
                return this.empty().append((this[0] && this[0].ownerDocument || document).createTextNode(F))
            }
            var E = "";
            o.each(F || this, function () {
                o.each(this.childNodes, function () {
                    if (this.nodeType != 8) {
                        E += this.nodeType != 1 ? this.nodeValue : o.fn.text([this])
                    }
                })
            });
            return E
        },
        wrapAll: function (E) {
            if (this[0]) {
                var F = o(E, this[0].ownerDocument).clone();
                if (this[0].parentNode) {
                    F.insertBefore(this[0])
                }
                F.map(function () {
                    var G = this;
                    while (G.firstChild) {
                        G = G.firstChild
                    }
                    return G
                }).append(this)
            }
            return this
        },
        wrapInner: function (E) {
            return this.each(function () {
                o(this).contents().wrapAll(E)
            })
        },
        wrap: function (E) {
            return this.each(function () {
                o(this).wrapAll(E)
            })
        },
        append: function () {
            return this.domManip(arguments, true, function (E) {
                if (this.nodeType == 1) {
                    this.appendChild(E)
                }
            })
        },
        prepend: function () {
            return this.domManip(arguments, true, function (E) {
                if (this.nodeType == 1) {
                    this.insertBefore(E, this.firstChild)
                }
            })
        },
        before: function () {
            return this.domManip(arguments, false, function (E) {
                this.parentNode.insertBefore(E, this)
            })
        },
        after: function () {
            return this.domManip(arguments, false, function (E) {
                this.parentNode.insertBefore(E, this.nextSibling)
            })
        },
        end: function () {
            return this.prevObject || o([])
        },
        push: [].push,
        sort: [].sort,
        splice: [].splice,
        find: function (E) {
            if (this.length === 1) {
                var F = this.pushStack([], "find", E);
                F.length = 0;
                o.find(E, this[0], F);
                return F
            } else {
                return this.pushStack(o.unique(o.map(this, function (G) {
                    return o.find(E, G)
                })), "find", E)
            }
        },
        clone: function (G) {
            var E = this.map(function () {
                if (!o.support.noCloneEvent && !o.isXMLDoc(this)) {
                    var I = this.outerHTML;
                    if (!I) {
                        var J = this.ownerDocument.createElement("div");
                        J.appendChild(this.cloneNode(true));
                        I = J.innerHTML
                    }
                    return o.clean([I.replace(/ jQuery\d+="(?:\d+|null)"/g, "").replace(/^\s*/, "")])[0]
                } else {
                    return this.cloneNode(true)
                }
            });
            if (G === true) {
                var H = this.find("*").andSelf(),
                    F = 0;
                E.find("*").andSelf().each(function () {
                    if (this.nodeName !== H[F].nodeName) {
                        return
                    }
                    var I = o.data(H[F], "events");
                    for (var K in I) {
                        for (var J in I[K]) {
                            o.event.add(this, K, I[K][J], I[K][J].data)
                        }
                    }
                    F++
                })
            }
            return E
        },
        filter: function (E) {
            return this.pushStack(o.isFunction(E) && o.grep(this, function (G, F) {
                return E.call(G, F)
            }) || o.multiFilter(E, o.grep(this, function (F) {
                return F.nodeType === 1
            })), "filter", E)
        },
        closest: function (E) {
            var G = o.expr.match.POS.test(E) ? o(E) : null,
                F = 0;
            return this.map(function () {
                var H = this;
                while (H && H.ownerDocument) {
                    if (G ? G.index(H) > -1 : o(H).is(E)) {
                        o.data(H, "closest", F);
                        return H
                    }
                    H = H.parentNode;
                    F++
                }
            })
        },
        not: function (E) {
            if (typeof E === "string") {
                if (f.test(E)) {
                    return this.pushStack(o.multiFilter(E, this, true), "not", E)
                } else {
                    E = o.multiFilter(E, this)
                }
            }
            var F = E.length && E[E.length - 1] !== g && !E.nodeType;
            return this.filter(function () {
                return F ? o.inArray(this, E) < 0 : this != E
            })
        },
        add: function (E) {
            return this.pushStack(o.unique(o.merge(this.get(), typeof E === "string" ? o(E) : o.makeArray(E))))
        },
        is: function (E) {
            return !!E && o.multiFilter(E, this).length > 0
        },
        hasClass: function (E) {
            return !!E && this.is("." + E)
        },
        val: function (K) {
            if (K === g) {
                var E = this[0];
                if (E) {
                    if (o.nodeName(E, "option")) {
                        return (E.attributes.value || {}).specified ? E.value : E.text
                    }
                    if (o.nodeName(E, "select")) {
                        var I = E.selectedIndex,
                            L = [],
                            M = E.options,
                            H = E.type == "select-one";
                        if (I < 0) {
                            return null
                        }
                        for (var F = H ? I : 0, J = H ? I + 1 : M.length; F < J; F++) {
                            var G = M[F];
                            if (G.selected) {
                                K = o(G).val();
                                if (H) {
                                    return K
                                }
                                L.push(K)
                            }
                        }
                        return L
                    }
                    return (E.value || "").replace(/\r/g, "")
                }
                return g
            }
            if (typeof K === "number") {
                K += ""
            }
            return this.each(function () {
                if (this.nodeType != 1) {
                    return
                }
                if (o.isArray(K) && /radio|checkbox/.test(this.type)) {
                    this.checked = (o.inArray(this.value, K) >= 0 || o.inArray(this.name, K) >= 0)
                } else {
                    if (o.nodeName(this, "select")) {
                        var N = o.makeArray(K);
                        o("option", this).each(function () {
                            this.selected = (o.inArray(this.value, N) >= 0 || o.inArray(this.text, N) >= 0)
                        });
                        if (!N.length) {
                            this.selectedIndex = -1
                        }
                    } else {
                        this.value = K
                    }
                }
            })
        },
        html: function (E) {
            return E === g ? (this[0] ? this[0].innerHTML.replace(/ jQuery\d+="(?:\d+|null)"/g, "") : null) : this.empty().append(E)
        },
        replaceWith: function (E) {
            return this.after(E).remove()
        },
        eq: function (E) {
            return this.slice(E, +E + 1)
        },
        slice: function () {
            return this.pushStack(Array.prototype.slice.apply(this, arguments), "slice", Array.prototype.slice.call(arguments).join(","))
        },
        map: function (E) {
            return this.pushStack(o.map(this, function (G, F) {
                return E.call(G, F, G)
            }))
        },
        andSelf: function () {
            return this.add(this.prevObject)
        },
        domManip: function (J, M, L) {
            if (this[0]) {
                var I = (this[0].ownerDocument || this[0]).createDocumentFragment(),
                    F = o.clean(J, (this[0].ownerDocument || this[0]), I),
                    H = I.firstChild;
                if (H) {
                    for (var G = 0, E = this.length; G < E; G++) {
                        L.call(K(this[G], H), this.length > 1 || G > 0 ? I.cloneNode(true) : I)
                    }
                }
                if (F) {
                    o.each(F, z)
                }
            }
            return this;

            function K(N, O) {
                return M && o.nodeName(N, "table") && o.nodeName(O, "tr") ? (N.getElementsByTagName("tbody")[0] || N.appendChild(N.ownerDocument.createElement("tbody"))) : N
            }
        }
    };
    o.fn.init.prototype = o.fn;

    function z(E, F) {
        if (F.src) {
            o.ajax({
                url: F.src,
                async: false,
                dataType: "script"
            })
        } else {
            o.globalEval(F.text || F.textContent || F.innerHTML || "")
        }
        if (F.parentNode) {
            F.parentNode.removeChild(F)
        }
    }
    function e() {
        return +new Date
    }
    o.extend = o.fn.extend = function () {
        var J = arguments[0] || {},
            H = 1,
            I = arguments.length,
            E = false,
            G;
        if (typeof J === "boolean") {
            E = J;
            J = arguments[1] || {};
            H = 2
        }
        if (typeof J !== "object" && !o.isFunction(J)) {
            J = {}
        }
        if (I == H) {
            J = this;
            --H
        }
        for (; H < I; H++) {
            if ((G = arguments[H]) != null) {
                for (var F in G) {
                    var K = J[F],
                        L = G[F];
                    if (J === L) {
                        continue
                    }
                    if (E && L && typeof L === "object" && !L.nodeType) {
                        J[F] = o.extend(E, K || (L.length != null ? [] : {}), L)
                    } else {
                        if (L !== g) {
                            J[F] = L
                        }
                    }
                }
            }
        }
        return J
    };
    var b = /z-?index|font-?weight|opacity|zoom|line-?height/i,
        q = document.defaultView || {},
        s = Object.prototype.toString;
    o.extend({
        noConflict: function (E) {
            l.$ = p;
            if (E) {
                l.jQuery = y
            }
            return o
        },
        isFunction: function (E) {
            return s.call(E) === "[object Function]"
        },
        isArray: function (E) {
            return s.call(E) === "[object Array]"
        },
        isXMLDoc: function (E) {
            return E.nodeType === 9 && E.documentElement.nodeName !== "HTML" || !! E.ownerDocument && o.isXMLDoc(E.ownerDocument)
        },
        globalEval: function (G) {
            if (G && /\S/.test(G)) {
                var F = document.getElementsByTagName("head")[0] || document.documentElement,
                    E = document.createElement("script");
                E.type = "text/javascript";
                if (o.support.scriptEval) {
                    E.appendChild(document.createTextNode(G))
                } else {
                    E.text = G
                }
                F.insertBefore(E, F.firstChild);
                F.removeChild(E)
            }
        },
        nodeName: function (F, E) {
            return F.nodeName && F.nodeName.toUpperCase() == E.toUpperCase()
        },
        each: function (G, K, F) {
            var E, H = 0,
                I = G.length;
            if (F) {
                if (I === g) {
                    for (E in G) {
                        if (K.apply(G[E], F) === false) {
                            break
                        }
                    }
                } else {
                    for (; H < I;) {
                        if (K.apply(G[H++], F) === false) {
                            break
                        }
                    }
                }
            } else {
                if (I === g) {
                    for (E in G) {
                        if (K.call(G[E], E, G[E]) === false) {
                            break
                        }
                    }
                } else {
                    for (var J = G[0]; H < I && K.call(J, H, J) !== false; J = G[++H]) {}
                }
            }
            return G
        },
        prop: function (H, I, G, F, E) {
            if (o.isFunction(I)) {
                I = I.call(H, F)
            }
            return typeof I === "number" && G == "curCSS" && !b.test(E) ? I + "px" : I
        },
        className: {
            add: function (E, F) {
                o.each((F || "").split(/\s+/), function (G, H) {
                    if (E.nodeType == 1 && !o.className.has(E.className, H)) {
                        E.className += (E.className ? " " : "") + H
                    }
                })
            },
            remove: function (E, F) {
                if (E.nodeType == 1) {
                    E.className = F !== g ? o.grep(E.className.split(/\s+/), function (G) {
                        return !o.className.has(F, G)
                    }).join(" ") : ""
                }
            },
            has: function (F, E) {
                return F && o.inArray(E, (F.className || F).toString().split(/\s+/)) > -1
            }
        },
        swap: function (H, G, I) {
            var E = {};
            for (var F in G) {
                E[F] = H.style[F];
                H.style[F] = G[F]
            }
            I.call(H);
            for (var F in G) {
                H.style[F] = E[F]
            }
        },
        css: function (H, F, J, E) {
            if (F == "width" || F == "height") {
                var L, G = {
                    position: "absolute",
                    visibility: "hidden",
                    display: "block"
                },
                    K = F == "width" ? ["Left", "Right"] : ["Top", "Bottom"];

                function I() {
                    L = F == "width" ? H.offsetWidth : H.offsetHeight;
                    if (E === "border") {
                        return
                    }
                    o.each(K, function () {
                        if (!E) {
                            L -= parseFloat(o.curCSS(H, "padding" + this, true)) || 0
                        }
                        if (E === "margin") {
                            L += parseFloat(o.curCSS(H, "margin" + this, true)) || 0
                        } else {
                            L -= parseFloat(o.curCSS(H, "border" + this + "Width", true)) || 0
                        }
                    })
                }
                if (H.offsetWidth !== 0) {
                    I()
                } else {
                    o.swap(H, G, I)
                }
                return Math.max(0, Math.round(L))
            }
            return o.curCSS(H, F, J)
        },
        curCSS: function (I, F, G) {
            var L, E = I.style;
            if (F == "opacity" && !o.support.opacity) {
                L = o.attr(E, "opacity");
                return L == "" ? "1" : L
            }
            if (F.match(/float/i)) {
                F = w
            }
            if (!G && E && E[F]) {
                L = E[F]
            } else {
                if (q.getComputedStyle) {
                    if (F.match(/float/i)) {
                        F = "float"
                    }
                    F = F.replace(/([A-Z])/g, "-$1").toLowerCase();
                    var M = q.getComputedStyle(I, null);
                    if (M) {
                        L = M.getPropertyValue(F)
                    }
                    if (F == "opacity" && L == "") {
                        L = "1"
                    }
                } else {
                    if (I.currentStyle) {
                        var J = F.replace(/\-(\w)/g, function (N, O) {
                            return O.toUpperCase()
                        });
                        L = I.currentStyle[F] || I.currentStyle[J];
                        if (!/^\d+(px)?$/i.test(L) && /^\d/.test(L)) {
                            var H = E.left,
                                K = I.runtimeStyle.left;
                            I.runtimeStyle.left = I.currentStyle.left;
                            E.left = L || 0;
                            L = E.pixelLeft + "px";
                            E.left = H;
                            I.runtimeStyle.left = K
                        }
                    }
                }
            }
            return L
        },
        clean: function (F, K, I) {
            K = K || document;
            if (typeof K.createElement === "undefined") {
                K = K.ownerDocument || K[0] && K[0].ownerDocument || document
            }
            if (!I && F.length === 1 && typeof F[0] === "string") {
                var H = /^<(\w+)\s*\/?>$/.exec(F[0]);
                if (H) {
                    return [K.createElement(H[1])]
                }
            }
            var G = [],
                E = [],
                L = K.createElement("div");
            o.each(F, function (P, S) {
                if (typeof S === "number") {
                    S += ""
                }
                if (!S) {
                    return
                }
                if (typeof S === "string") {
                    S = S.replace(/(<(\w+)[^>]*?)\/>/g, function (U, V, T) {
                        return T.match(/^(abbr|br|col|img|input|link|meta|param|hr|area|embed)$/i) ? U : V + "></" + T + ">"
                    });
                    var O = S.replace(/^\s+/, "").substring(0, 10).toLowerCase();
                    var Q = !O.indexOf("<opt") && [1, "<select multiple='multiple'>", "</select>"] || !O.indexOf("<leg") && [1, "<fieldset>", "</fieldset>"] || O.match(/^<(thead|tbody|tfoot|colg|cap)/) && [1, "<table>", "</table>"] || !O.indexOf("<tr") && [2, "<table><tbody>", "</tbody></table>"] || (!O.indexOf("<td") || !O.indexOf("<th")) && [3, "<table><tbody><tr>", "</tr></tbody></table>"] || !O.indexOf("<col") && [2, "<table><tbody></tbody><colgroup>", "</colgroup></table>"] || !o.support.htmlSerialize && [1, "div<div>", "</div>"] || [0, "", ""];
                    L.innerHTML = Q[1] + S + Q[2];
                    while (Q[0]--) {
                        L = L.lastChild
                    }
                    if (!o.support.tbody) {
                        var R = /<tbody/i.test(S),
                            N = !O.indexOf("<table") && !R ? L.firstChild && L.firstChild.childNodes : Q[1] == "<table>" && !R ? L.childNodes : [];
                        for (var M = N.length - 1; M >= 0; --M) {
                            if (o.nodeName(N[M], "tbody") && !N[M].childNodes.length) {
                                N[M].parentNode.removeChild(N[M])
                            }
                        }
                    }
                    if (!o.support.leadingWhitespace && /^\s/.test(S)) {
                        L.insertBefore(K.createTextNode(S.match(/^\s*/)[0]), L.firstChild)
                    }
                    S = o.makeArray(L.childNodes)
                }
                if (S.nodeType) {
                    G.push(S)
                } else {
                    G = o.merge(G, S)
                }
            });
            if (I) {
                for (var J = 0; G[J]; J++) {
                    if (o.nodeName(G[J], "script") && (!G[J].type || G[J].type.toLowerCase() === "text/javascript")) {
                        E.push(G[J].parentNode ? G[J].parentNode.removeChild(G[J]) : G[J])
                    } else {
                        if (G[J].nodeType === 1) {
                            G.splice.apply(G, [J + 1, 0].concat(o.makeArray(G[J].getElementsByTagName("script"))))
                        }
                        I.appendChild(G[J])
                    }
                }
                return E
            }
            return G
        },
        attr: function (J, G, K) {
            if (!J || J.nodeType == 3 || J.nodeType == 8) {
                return g
            }
            var H = !o.isXMLDoc(J),
                L = K !== g;
            G = H && o.props[G] || G;
            if (J.tagName) {
                var F = /href|src|style/.test(G);
                if (G == "selected" && J.parentNode) {
                    J.parentNode.selectedIndex
                }
                if (G in J && H && !F) {
                    if (L) {
                        if (G == "type" && o.nodeName(J, "input") && J.parentNode) {
                            throw "type property can't be changed"
                        }
                        J[G] = K
                    }
                    if (o.nodeName(J, "form") && J.getAttributeNode(G)) {
                        return J.getAttributeNode(G).nodeValue
                    }
                    if (G == "tabIndex") {
                        var I = J.getAttributeNode("tabIndex");
                        return I && I.specified ? I.value : J.nodeName.match(/(button|input|object|select|textarea)/i) ? 0 : J.nodeName.match(/^(a|area)$/i) && J.href ? 0 : g
                    }
                    return J[G]
                }
                if (!o.support.style && H && G == "style") {
                    return o.attr(J.style, "cssText", K)
                }
                if (L) {
                    J.setAttribute(G, "" + K)
                }
                var E = !o.support.hrefNormalized && H && F ? J.getAttribute(G, 2) : J.getAttribute(G);
                return E === null ? g : E
            }
            if (!o.support.opacity && G == "opacity") {
                if (L) {
                    J.zoom = 1;
                    J.filter = (J.filter || "").replace(/alpha\([^)]*\)/, "") + (parseInt(K) + "" == "NaN" ? "" : "alpha(opacity=" + K * 100 + ")")
                }
                return J.filter && J.filter.indexOf("opacity=") >= 0 ? (parseFloat(J.filter.match(/opacity=([^)]*)/)[1]) / 100) + "" : ""
            }
            G = G.replace(/-([a-z])/ig, function (M, N) {
                return N.toUpperCase()
            });
            if (L) {
                J[G] = K
            }
            return J[G]
        },
        trim: function (E) {
            return (E || "").replace(/^\s+|\s+$/g, "")
        },
        makeArray: function (G) {
            var E = [];
            if (G != null) {
                var F = G.length;
                if (F == null || typeof G === "string" || o.isFunction(G) || G.setInterval) {
                    E[0] = G
                } else {
                    while (F) {
                        E[--F] = G[F]
                    }
                }
            }
            return E
        },
        inArray: function (G, H) {
            for (var E = 0, F = H.length; E < F; E++) {
                if (H[E] === G) {
                    return E
                }
            }
            return -1
        },
        merge: function (H, E) {
            var F = 0,
                G, I = H.length;
            if (!o.support.getAll) {
                while ((G = E[F++]) != null) {
                    if (G.nodeType != 8) {
                        H[I++] = G
                    }
                }
            } else {
                while ((G = E[F++]) != null) {
                    H[I++] = G
                }
            }
            return H
        },
        unique: function (K) {
            var F = [],
                E = {};
            try {
                for (var G = 0, H = K.length; G < H; G++) {
                    var J = o.data(K[G]);
                    if (!E[J]) {
                        E[J] = true;
                        F.push(K[G])
                    }
                }
            } catch (I) {
                F = K
            }
            return F
        },
        grep: function (F, J, E) {
            var G = [];
            for (var H = 0, I = F.length; H < I; H++) {
                if (!E != !J(F[H], H)) {
                    G.push(F[H])
                }
            }
            return G
        },
        map: function (E, J) {
            var F = [];
            for (var G = 0, H = E.length; G < H; G++) {
                var I = J(E[G], G);
                if (I != null) {
                    F[F.length] = I
                }
            }
            return F.concat.apply([], F)
        }
    });
    var C = navigator.userAgent.toLowerCase();
    o.browser = {
        version: (C.match(/.+(?:rv|it|ra|ie)[\/: ]([\d.]+)/) || [0, "0"])[1],
        safari: /webkit/.test(C),
        opera: /opera/.test(C),
        msie: /msie/.test(C) && !/opera/.test(C),
        mozilla: /mozilla/.test(C) && !/(compatible|webkit)/.test(C)
    };
    o.each({
        parent: function (E) {
            return E.parentNode
        },
        parents: function (E) {
            return o.dir(E, "parentNode")
        },
        next: function (E) {
            return o.nth(E, 2, "nextSibling")
        },
        prev: function (E) {
            return o.nth(E, 2, "previousSibling")
        },
        nextAll: function (E) {
            return o.dir(E, "nextSibling")
        },
        prevAll: function (E) {
            return o.dir(E, "previousSibling")
        },
        siblings: function (E) {
            return o.sibling(E.parentNode.firstChild, E)
        },
        children: function (E) {
            return o.sibling(E.firstChild)
        },
        contents: function (E) {
            return o.nodeName(E, "iframe") ? E.contentDocument || E.contentWindow.document : o.makeArray(E.childNodes)
        }
    }, function (E, F) {
        o.fn[E] = function (G) {
            var H = o.map(this, F);
            if (G && typeof G == "string") {
                H = o.multiFilter(G, H)
            }
            return this.pushStack(o.unique(H), E, G)
        }
    });
    o.each({
        appendTo: "append",
        prependTo: "prepend",
        insertBefore: "before",
        insertAfter: "after",
        replaceAll: "replaceWith"
    }, function (E, F) {
        o.fn[E] = function (G) {
            var J = [],
                L = o(G);
            for (var K = 0, H = L.length; K < H; K++) {
                var I = (K > 0 ? this.clone(true) : this).get();
                o.fn[F].apply(o(L[K]), I);
                J = J.concat(I)
            }
            return this.pushStack(J, E, G)
        }
    });
    o.each({
        removeAttr: function (E) {
            o.attr(this, E, "");
            if (this.nodeType == 1) {
                this.removeAttribute(E)
            }
        },
        addClass: function (E) {
            o.className.add(this, E)
        },
        removeClass: function (E) {
            o.className.remove(this, E)
        },
        toggleClass: function (F, E) {
            if (typeof E !== "boolean") {
                E = !o.className.has(this, F)
            }
            o.className[E ? "add" : "remove"](this, F)
        },
        remove: function (E) {
            if (!E || o.filter(E, [this]).length) {
                o("*", this).add([this]).each(function () {
                    o.event.remove(this);
                    o.removeData(this)
                });
                if (this.parentNode) {
                    this.parentNode.removeChild(this)
                }
            }
        },
        empty: function () {
            o(this).children().remove();
            while (this.firstChild) {
                this.removeChild(this.firstChild)
            }
        }
    }, function (E, F) {
        o.fn[E] = function () {
            return this.each(F, arguments)
        }
    });

    function j(E, F) {
        return E[0] && parseInt(o.curCSS(E[0], F, true), 10) || 0
    }
    var h = "jQuery" + e(),
        v = 0,
        A = {};
    o.extend({
        cache: {},
        data: function (F, E, G) {
            F = F == l ? A : F;
            var H = F[h];
            if (!H) {
                H = F[h] = ++v
            }
            if (E && !o.cache[H]) {
                o.cache[H] = {}
            }
            if (G !== g) {
                o.cache[H][E] = G
            }
            return E ? o.cache[H][E] : H
        },
        removeData: function (F, E) {
            F = F == l ? A : F;
            var H = F[h];
            if (E) {
                if (o.cache[H]) {
                    delete o.cache[H][E];
                    E = "";
                    for (E in o.cache[H]) {
                        break
                    }
                    if (!E) {
                        o.removeData(F)
                    }
                }
            } else {
                try {
                    delete F[h]
                } catch (G) {
                    if (F.removeAttribute) {
                        F.removeAttribute(h)
                    }
                }
                delete o.cache[H]
            }
        },
        queue: function (F, E, H) {
            if (F) {
                E = (E || "fx") + "queue";
                var G = o.data(F, E);
                if (!G || o.isArray(H)) {
                    G = o.data(F, E, o.makeArray(H))
                } else {
                    if (H) {
                        G.push(H)
                    }
                }
            }
            return G
        },
        dequeue: function (H, G) {
            var E = o.queue(H, G),
                F = E.shift();
            if (!G || G === "fx") {
                F = E[0]
            }
            if (F !== g) {
                F.call(H)
            }
        }
    });
    o.fn.extend({
        data: function (E, G) {
            var H = E.split(".");
            H[1] = H[1] ? "." + H[1] : "";
            if (G === g) {
                var F = this.triggerHandler("getData" + H[1] + "!", [H[0]]);
                if (F === g && this.length) {
                    F = o.data(this[0], E)
                }
                return F === g && H[1] ? this.data(H[0]) : F
            } else {
                return this.trigger("setData" + H[1] + "!", [H[0], G]).each(function () {
                    o.data(this, E, G)
                })
            }
        },
        removeData: function (E) {
            return this.each(function () {
                o.removeData(this, E)
            })
        },
        queue: function (E, F) {
            if (typeof E !== "string") {
                F = E;
                E = "fx"
            }
            if (F === g) {
                return o.queue(this[0], E)
            }
            return this.each(function () {
                var G = o.queue(this, E, F);
                if (E == "fx" && G.length == 1) {
                    G[0].call(this)
                }
            })
        },
        dequeue: function (E) {
            return this.each(function () {
                o.dequeue(this, E)
            })
        }
    });
    (function () {
        var R = /((?:\((?:\([^()]+\)|[^()]+)+\)|\[(?:\[[^[\]]*\]|['"][^'"]*['"]|[^[\]'"]+)+\]|\\.|[^ >+~,(\[\\]+)+|[>+~])(\s*,\s*)?/g,
            L = 0,
            H = Object.prototype.toString;
        var F = function (Y, U, ab, ac) {
            ab = ab || [];
            U = U || document;
            if (U.nodeType !== 1 && U.nodeType !== 9) {
                return []
            }
            if (!Y || typeof Y !== "string") {
                return ab
            }
            var Z = [],
                W, af, ai, T, ad, V, X = true;
            R.lastIndex = 0;
            while ((W = R.exec(Y)) !== null) {
                Z.push(W[1]);
                if (W[2]) {
                    V = RegExp.rightContext;
                    break
                }
            }
            if (Z.length > 1 && M.exec(Y)) {
                if (Z.length === 2 && I.relative[Z[0]]) {
                    af = J(Z[0] + Z[1], U)
                } else {
                    af = I.relative[Z[0]] ? [U] : F(Z.shift(), U);
                    while (Z.length) {
                        Y = Z.shift();
                        if (I.relative[Y]) {
                            Y += Z.shift()
                        }
                        af = J(Y, af)
                    }
                }
            } else {
                var ae = ac ? {
                    expr: Z.pop(),
                    set: E(ac)
                } : F.find(Z.pop(), Z.length === 1 && U.parentNode ? U.parentNode : U, Q(U));
                af = F.filter(ae.expr, ae.set);
                if (Z.length > 0) {
                    ai = E(af)
                } else {
                    X = false
                }
                while (Z.length) {
                    var ah = Z.pop(),
                        ag = ah;
                    if (!I.relative[ah]) {
                        ah = ""
                    } else {
                        ag = Z.pop()
                    }
                    if (ag == null) {
                        ag = U
                    }
                    I.relative[ah](ai, ag, Q(U))
                }
            }
            if (!ai) {
                ai = af
            }
            if (!ai) {
                throw "Syntax error, unrecognized expression: " + (ah || Y)
            }
            if (H.call(ai) === "[object Array]") {
                if (!X) {
                    ab.push.apply(ab, ai)
                } else {
                    if (U.nodeType === 1) {
                        for (var aa = 0; ai[aa] != null; aa++) {
                            if (ai[aa] && (ai[aa] === true || ai[aa].nodeType === 1 && K(U, ai[aa]))) {
                                ab.push(af[aa])
                            }
                        }
                    } else {
                        for (var aa = 0; ai[aa] != null; aa++) {
                            if (ai[aa] && ai[aa].nodeType === 1) {
                                ab.push(af[aa])
                            }
                        }
                    }
                }
            } else {
                E(ai, ab)
            }
            if (V) {
                F(V, U, ab, ac);
                if (G) {
                    hasDuplicate = false;
                    ab.sort(G);
                    if (hasDuplicate) {
                        for (var aa = 1; aa < ab.length; aa++) {
                            if (ab[aa] === ab[aa - 1]) {
                                ab.splice(aa--, 1)
                            }
                        }
                    }
                }
            }
            return ab
        };
        F.matches = function (T, U) {
            return F(T, null, null, U)
        };
        F.find = function (aa, T, ab) {
            var Z, X;
            if (!aa) {
                return []
            }
            for (var W = 0, V = I.order.length; W < V; W++) {
                var Y = I.order[W],
                    X;
                if ((X = I.match[Y].exec(aa))) {
                    var U = RegExp.leftContext;
                    if (U.substr(U.length - 1) !== "\\") {
                        X[1] = (X[1] || "").replace(/\\/g, "");
                        Z = I.find[Y](X, T, ab);
                        if (Z != null) {
                            aa = aa.replace(I.match[Y], "");
                            break
                        }
                    }
                }
            }
            if (!Z) {
                Z = T.getElementsByTagName("*")
            }
            return {
                set: Z,
                expr: aa
            }
        };
        F.filter = function (ad, ac, ag, W) {
            var V = ad,
                ai = [],
                aa = ac,
                Y, T, Z = ac && ac[0] && Q(ac[0]);
            while (ad && ac.length) {
                for (var ab in I.filter) {
                    if ((Y = I.match[ab].exec(ad)) != null) {
                        var U = I.filter[ab],
                            ah, af;
                        T = false;
                        if (aa == ai) {
                            ai = []
                        }
                        if (I.preFilter[ab]) {
                            Y = I.preFilter[ab](Y, aa, ag, ai, W, Z);
                            if (!Y) {
                                T = ah = true
                            } else {
                                if (Y === true) {
                                    continue
                                }
                            }
                        }
                        if (Y) {
                            for (var X = 0;
                            (af = aa[X]) != null; X++) {
                                if (af) {
                                    ah = U(af, Y, X, aa);
                                    var ae = W ^ !! ah;
                                    if (ag && ah != null) {
                                        if (ae) {
                                            T = true
                                        } else {
                                            aa[X] = false
                                        }
                                    } else {
                                        if (ae) {
                                            ai.push(af);
                                            T = true
                                        }
                                    }
                                }
                            }
                        }
                        if (ah !== g) {
                            if (!ag) {
                                aa = ai
                            }
                            ad = ad.replace(I.match[ab], "");
                            if (!T) {
                                return []
                            }
                            break
                        }
                    }
                }
                if (ad == V) {
                    if (T == null) {
                        throw "Syntax error, unrecognized expression: " + ad
                    } else {
                        break
                    }
                }
                V = ad
            }
            return aa
        };
        var I = F.selectors = {
            order: ["ID", "NAME", "TAG"],
            match: {
                ID: /#((?:[\w\u00c0-\uFFFF_-]|\\.)+)/,
                CLASS: /\.((?:[\w\u00c0-\uFFFF_-]|\\.)+)/,
                NAME: /\[name=['"]*((?:[\w\u00c0-\uFFFF_-]|\\.)+)['"]*\]/,
                ATTR: /\[\s*((?:[\w\u00c0-\uFFFF_-]|\\.)+)\s*(?:(\S?=)\s*(['"]*)(.*?)\3|)\s*\]/,
                TAG: /^((?:[\w\u00c0-\uFFFF\*_-]|\\.)+)/,
                CHILD: /:(only|nth|last|first)-child(?:\((even|odd|[\dn+-]*)\))?/,
                POS: /:(nth|eq|gt|lt|first|last|even|odd)(?:\((\d*)\))?(?=[^-]|$)/,
                PSEUDO: /:((?:[\w\u00c0-\uFFFF_-]|\\.)+)(?:\((['"]*)((?:\([^\)]+\)|[^\2\(\)]*)+)\2\))?/
            },
            attrMap: {
                "class": "className",
                "for": "htmlFor"
            },
            attrHandle: {
                href: function (T) {
                    return T.getAttribute("href")
                }
            },
            relative: {
                "+": function (aa, T, Z) {
                    var X = typeof T === "string",
                        ab = X && !/\W/.test(T),
                        Y = X && !ab;
                    if (ab && !Z) {
                        T = T.toUpperCase()
                    }
                    for (var W = 0, V = aa.length, U; W < V; W++) {
                        if ((U = aa[W])) {
                            while ((U = U.previousSibling) && U.nodeType !== 1) {}
                            aa[W] = Y || U && U.nodeName === T ? U || false : U === T
                        }
                    }
                    if (Y) {
                        F.filter(T, aa, true)
                    }
                },
                ">": function (Z, U, aa) {
                    var X = typeof U === "string";
                    if (X && !/\W/.test(U)) {
                        U = aa ? U : U.toUpperCase();
                        for (var V = 0, T = Z.length; V < T; V++) {
                            var Y = Z[V];
                            if (Y) {
                                var W = Y.parentNode;
                                Z[V] = W.nodeName === U ? W : false
                            }
                        }
                    } else {
                        for (var V = 0, T = Z.length; V < T; V++) {
                            var Y = Z[V];
                            if (Y) {
                                Z[V] = X ? Y.parentNode : Y.parentNode === U
                            }
                        }
                        if (X) {
                            F.filter(U, Z, true)
                        }
                    }
                },
                "": function (W, U, Y) {
                    var V = L++,
                        T = S;
                    if (!U.match(/\W/)) {
                        var X = U = Y ? U : U.toUpperCase();
                        T = P
                    }
                    T("parentNode", U, V, W, X, Y)
                },
                "~": function (W, U, Y) {
                    var V = L++,
                        T = S;
                    if (typeof U === "string" && !U.match(/\W/)) {
                        var X = U = Y ? U : U.toUpperCase();
                        T = P
                    }
                    T("previousSibling", U, V, W, X, Y)
                }
            },
            find: {
                ID: function (U, V, W) {
                    if (typeof V.getElementById !== "undefined" && !W) {
                        var T = V.getElementById(U[1]);
                        return T ? [T] : []
                    }
                },
                NAME: function (V, Y, Z) {
                    if (typeof Y.getElementsByName !== "undefined") {
                        var U = [],
                            X = Y.getElementsByName(V[1]);
                        for (var W = 0, T = X.length; W < T; W++) {
                            if (X[W].getAttribute("name") === V[1]) {
                                U.push(X[W])
                            }
                        }
                        return U.length === 0 ? null : U
                    }
                },
                TAG: function (T, U) {
                    return U.getElementsByTagName(T[1])
                }
            },
            preFilter: {
                CLASS: function (W, U, V, T, Z, aa) {
                    W = " " + W[1].replace(/\\/g, "") + " ";
                    if (aa) {
                        return W
                    }
                    for (var X = 0, Y;
                    (Y = U[X]) != null; X++) {
                        if (Y) {
                            if (Z ^ (Y.className && (" " + Y.className + " ").indexOf(W) >= 0)) {
                                if (!V) {
                                    T.push(Y)
                                }
                            } else {
                                if (V) {
                                    U[X] = false
                                }
                            }
                        }
                    }
                    return false
                },
                ID: function (T) {
                    return T[1].replace(/\\/g, "")
                },
                TAG: function (U, T) {
                    for (var V = 0; T[V] === false; V++) {}
                    return T[V] && Q(T[V]) ? U[1] : U[1].toUpperCase()
                },
                CHILD: function (T) {
                    if (T[1] == "nth") {
                        var U = /(-?)(\d*)n((?:\+|-)?\d*)/.exec(T[2] == "even" && "2n" || T[2] == "odd" && "2n+1" || !/\D/.test(T[2]) && "0n+" + T[2] || T[2]);
                        T[2] = (U[1] + (U[2] || 1)) - 0;
                        T[3] = U[3] - 0
                    }
                    T[0] = L++;
                    return T
                },
                ATTR: function (X, U, V, T, Y, Z) {
                    var W = X[1].replace(/\\/g, "");
                    if (!Z && I.attrMap[W]) {
                        X[1] = I.attrMap[W]
                    }
                    if (X[2] === "~=") {
                        X[4] = " " + X[4] + " "
                    }
                    return X
                },
                PSEUDO: function (X, U, V, T, Y) {
                    if (X[1] === "not") {
                        if (X[3].match(R).length > 1 || /^\w/.test(X[3])) {
                            X[3] = F(X[3], null, null, U)
                        } else {
                            var W = F.filter(X[3], U, V, true ^ Y);
                            if (!V) {
                                T.push.apply(T, W)
                            }
                            return false
                        }
                    } else {
                        if (I.match.POS.test(X[0]) || I.match.CHILD.test(X[0])) {
                            return true
                        }
                    }
                    return X
                },
                POS: function (T) {
                    T.unshift(true);
                    return T
                }
            },
            filters: {
                enabled: function (T) {
                    return T.disabled === false && T.type !== "hidden"
                },
                disabled: function (T) {
                    return T.disabled === true
                },
                checked: function (T) {
                    return T.checked === true
                },
                selected: function (T) {
                    T.parentNode.selectedIndex;
                    return T.selected === true
                },
                parent: function (T) {
                    return !!T.firstChild
                },
                empty: function (T) {
                    return !T.firstChild
                },
                has: function (V, U, T) {
                    return !!F(T[3], V).length
                },
                header: function (T) {
                    return /h\d/i.test(T.nodeName)
                },
                text: function (T) {
                    return "text" === T.type
                },
                radio: function (T) {
                    return "radio" === T.type
                },
                checkbox: function (T) {
                    return "checkbox" === T.type
                },
                file: function (T) {
                    return "file" === T.type
                },
                password: function (T) {
                    return "password" === T.type
                },
                submit: function (T) {
                    return "submit" === T.type
                },
                image: function (T) {
                    return "image" === T.type
                },
                reset: function (T) {
                    return "reset" === T.type
                },
                button: function (T) {
                    return "button" === T.type || T.nodeName.toUpperCase() === "BUTTON"
                },
                input: function (T) {
                    return /input|select|textarea|button/i.test(T.nodeName)
                }
            },
            setFilters: {
                first: function (U, T) {
                    return T === 0
                },
                last: function (V, U, T, W) {
                    return U === W.length - 1
                },
                even: function (U, T) {
                    return T % 2 === 0
                },
                odd: function (U, T) {
                    return T % 2 === 1
                },
                lt: function (V, U, T) {
                    return U < T[3] - 0
                },
                gt: function (V, U, T) {
                    return U > T[3] - 0
                },
                nth: function (V, U, T) {
                    return T[3] - 0 == U
                },
                eq: function (V, U, T) {
                    return T[3] - 0 == U
                }
            },
            filter: {
                PSEUDO: function (Z, V, W, aa) {
                    var U = V[1],
                        X = I.filters[U];
                    if (X) {
                        return X(Z, W, V, aa)
                    } else {
                        if (U === "contains") {
                            return (Z.textContent || Z.innerText || "").indexOf(V[3]) >= 0
                        } else {
                            if (U === "not") {
                                var Y = V[3];
                                for (var W = 0, T = Y.length; W < T; W++) {
                                    if (Y[W] === Z) {
                                        return false
                                    }
                                }
                                return true
                            }
                        }
                    }
                },
                CHILD: function (T, W) {
                    var Z = W[1],
                        U = T;
                    switch (Z) {
                    case "only":
                    case "first":
                        while (U = U.previousSibling) {
                            if (U.nodeType === 1) {
                                return false
                            }
                        }
                        if (Z == "first") {
                            return true
                        }
                        U = T;
                    case "last":
                        while (U = U.nextSibling) {
                            if (U.nodeType === 1) {
                                return false
                            }
                        }
                        return true;
                    case "nth":
                        var V = W[2],
                            ac = W[3];
                        if (V == 1 && ac == 0) {
                            return true
                        }
                        var Y = W[0],
                            ab = T.parentNode;
                        if (ab && (ab.sizcache !== Y || !T.nodeIndex)) {
                            var X = 0;
                            for (U = ab.firstChild; U; U = U.nextSibling) {
                                if (U.nodeType === 1) {
                                    U.nodeIndex = ++X
                                }
                            }
                            ab.sizcache = Y
                        }
                        var aa = T.nodeIndex - ac;
                        if (V == 0) {
                            return aa == 0
                        } else {
                            return (aa % V == 0 && aa / V >= 0)
                        }
                    }
                },
                ID: function (U, T) {
                    return U.nodeType === 1 && U.getAttribute("id") === T
                },
                TAG: function (U, T) {
                    return (T === "*" && U.nodeType === 1) || U.nodeName === T
                },
                CLASS: function (U, T) {
                    return (" " + (U.className || U.getAttribute("class")) + " ").indexOf(T) > -1
                },
                ATTR: function (Y, W) {
                    var V = W[1],
                        T = I.attrHandle[V] ? I.attrHandle[V](Y) : Y[V] != null ? Y[V] : Y.getAttribute(V),
                        Z = T + "",
                        X = W[2],
                        U = W[4];
                    return T == null ? X === "!=" : X === "=" ? Z === U : X === "*=" ? Z.indexOf(U) >= 0 : X === "~=" ? (" " + Z + " ").indexOf(U) >= 0 : !U ? Z && T !== false : X === "!=" ? Z != U : X === "^=" ? Z.indexOf(U) === 0 : X === "$=" ? Z.substr(Z.length - U.length) === U : X === "|=" ? Z === U || Z.substr(0, U.length + 1) === U + "-" : false
                },
                POS: function (X, U, V, Y) {
                    var T = U[2],
                        W = I.setFilters[T];
                    if (W) {
                        return W(X, V, U, Y)
                    }
                }
            }
        };
        var M = I.match.POS;
        for (var O in I.match) {
            I.match[O] = RegExp(I.match[O].source + /(?![^\[]*\])(?![^\(]*\))/.source)
        }
        var E = function (U, T) {
            U = Array.prototype.slice.call(U);
            if (T) {
                T.push.apply(T, U);
                return T
            }
            return U
        };
        try {
            Array.prototype.slice.call(document.documentElement.childNodes)
        } catch (N) {
            E = function (X, W) {
                var U = W || [];
                if (H.call(X) === "[object Array]") {
                    Array.prototype.push.apply(U, X)
                } else {
                    if (typeof X.length === "number") {
                        for (var V = 0, T = X.length; V < T; V++) {
                            U.push(X[V])
                        }
                    } else {
                        for (var V = 0; X[V]; V++) {
                            U.push(X[V])
                        }
                    }
                }
                return U
            }
        }
        var G;
        if (document.documentElement.compareDocumentPosition) {
            G = function (U, T) {
                var V = U.compareDocumentPosition(T) & 4 ? -1 : U === T ? 0 : 1;
                if (V === 0) {
                    hasDuplicate = true
                }
                return V
            }
        } else {
            if ("sourceIndex" in document.documentElement) {
                G = function (U, T) {
                    var V = U.sourceIndex - T.sourceIndex;
                    if (V === 0) {
                        hasDuplicate = true
                    }
                    return V
                }
            } else {
                if (document.createRange) {
                    G = function (W, U) {
                        var V = W.ownerDocument.createRange(),
                            T = U.ownerDocument.createRange();
                        V.selectNode(W);
                        V.collapse(true);
                        T.selectNode(U);
                        T.collapse(true);
                        var X = V.compareBoundaryPoints(Range.START_TO_END, T);
                        if (X === 0) {
                            hasDuplicate = true
                        }
                        return X
                    }
                }
            }
        }(function () {
            var U = document.createElement("form"),
                V = "script" + (new Date).getTime();
            U.innerHTML = "<input name='" + V + "'/>";
            var T = document.documentElement;
            T.insertBefore(U, T.firstChild);
            if ( !! document.getElementById(V)) {
                I.find.ID = function (X, Y, Z) {
                    if (typeof Y.getElementById !== "undefined" && !Z) {
                        var W = Y.getElementById(X[1]);
                        return W ? W.id === X[1] || typeof W.getAttributeNode !== "undefined" && W.getAttributeNode("id").nodeValue === X[1] ? [W] : g : []
                    }
                };
                I.filter.ID = function (Y, W) {
                    var X = typeof Y.getAttributeNode !== "undefined" && Y.getAttributeNode("id");
                    return Y.nodeType === 1 && X && X.nodeValue === W
                }
            }
            T.removeChild(U)
        })();
        (function () {
            var T = document.createElement("div");
            T.appendChild(document.createComment(""));
            if (T.getElementsByTagName("*").length > 0) {
                I.find.TAG = function (U, Y) {
                    var X = Y.getElementsByTagName(U[1]);
                    if (U[1] === "*") {
                        var W = [];
                        for (var V = 0; X[V]; V++) {
                            if (X[V].nodeType === 1) {
                                W.push(X[V])
                            }
                        }
                        X = W
                    }
                    return X
                }
            }
            T.innerHTML = "<a href='#'></a>";
            if (T.firstChild && typeof T.firstChild.getAttribute !== "undefined" && T.firstChild.getAttribute("href") !== "#") {
                I.attrHandle.href = function (U) {
                    return U.getAttribute("href", 2)
                }
            }
        })();
        if (document.querySelectorAll) {
            (function () {
                var T = F,
                    U = document.createElement("div");
                U.innerHTML = "<p class='TEST'></p>";
                if (U.querySelectorAll && U.querySelectorAll(".TEST").length === 0) {
                    return
                }
                F = function (Y, X, V, W) {
                    X = X || document;
                    if (!W && X.nodeType === 9 && !Q(X)) {
                        try {
                            return E(X.querySelectorAll(Y), V)
                        } catch (Z) {}
                    }
                    return T(Y, X, V, W)
                };
                F.find = T.find;
                F.filter = T.filter;
                F.selectors = T.selectors;
                F.matches = T.matches
            })()
        }
        if (document.getElementsByClassName && document.documentElement.getElementsByClassName) {
            (function () {
                var T = document.createElement("div");
                T.innerHTML = "<div class='test e'></div><div class='test'></div>";
                if (T.getElementsByClassName("e").length === 0) {
                    return
                }
                T.lastChild.className = "e";
                if (T.getElementsByClassName("e").length === 1) {
                    return
                }
                I.order.splice(1, 0, "CLASS");
                I.find.CLASS = function (U, V, W) {
                    if (typeof V.getElementsByClassName !== "undefined" && !W) {
                        return V.getElementsByClassName(U[1])
                    }
                }
            })()
        }
        function P(U, Z, Y, ad, aa, ac) {
            var ab = U == "previousSibling" && !ac;
            for (var W = 0, V = ad.length; W < V; W++) {
                var T = ad[W];
                if (T) {
                    if (ab && T.nodeType === 1) {
                        T.sizcache = Y;
                        T.sizset = W
                    }
                    T = T[U];
                    var X = false;
                    while (T) {
                        if (T.sizcache === Y) {
                            X = ad[T.sizset];
                            break
                        }
                        if (T.nodeType === 1 && !ac) {
                            T.sizcache = Y;
                            T.sizset = W
                        }
                        if (T.nodeName === Z) {
                            X = T;
                            break
                        }
                        T = T[U]
                    }
                    ad[W] = X
                }
            }
        }
        function S(U, Z, Y, ad, aa, ac) {
            var ab = U == "previousSibling" && !ac;
            for (var W = 0, V = ad.length; W < V; W++) {
                var T = ad[W];
                if (T) {
                    if (ab && T.nodeType === 1) {
                        T.sizcache = Y;
                        T.sizset = W
                    }
                    T = T[U];
                    var X = false;
                    while (T) {
                        if (T.sizcache === Y) {
                            X = ad[T.sizset];
                            break
                        }
                        if (T.nodeType === 1) {
                            if (!ac) {
                                T.sizcache = Y;
                                T.sizset = W
                            }
                            if (typeof Z !== "string") {
                                if (T === Z) {
                                    X = true;
                                    break
                                }
                            } else {
                                if (F.filter(Z, [T]).length > 0) {
                                    X = T;
                                    break
                                }
                            }
                        }
                        T = T[U]
                    }
                    ad[W] = X
                }
            }
        }
        var K = document.compareDocumentPosition ?
        function (U, T) {
            return U.compareDocumentPosition(T) & 16
        } : function (U, T) {
            return U !== T && (U.contains ? U.contains(T) : true)
        };
        var Q = function (T) {
            return T.nodeType === 9 && T.documentElement.nodeName !== "HTML" || !! T.ownerDocument && Q(T.ownerDocument)
        };
        var J = function (T, aa) {
            var W = [],
                X = "",
                Y, V = aa.nodeType ? [aa] : aa;
            while ((Y = I.match.PSEUDO.exec(T))) {
                X += Y[0];
                T = T.replace(I.match.PSEUDO, "")
            }
            T = I.relative[T] ? T + "*" : T;
            for (var Z = 0, U = V.length; Z < U; Z++) {
                F(T, V[Z], W)
            }
            return F.filter(X, W)
        };
        o.find = F;
        o.filter = F.filter;
        o.expr = F.selectors;
        o.expr[":"] = o.expr.filters;
        F.selectors.filters.hidden = function (T) {
            return T.offsetWidth === 0 || T.offsetHeight === 0
        };
        F.selectors.filters.visible = function (T) {
            return T.offsetWidth > 0 || T.offsetHeight > 0
        };
        F.selectors.filters.animated = function (T) {
            return o.grep(o.timers, function (U) {
                return T === U.elem
            }).length
        };
        o.multiFilter = function (V, T, U) {
            if (U) {
                V = ":not(" + V + ")"
            }
            return F.matches(V, T)
        };
        o.dir = function (V, U) {
            var T = [],
                W = V[U];
            while (W && W != document) {
                if (W.nodeType == 1) {
                    T.push(W)
                }
                W = W[U]
            }
            return T
        };
        o.nth = function (X, T, V, W) {
            T = T || 1;
            var U = 0;
            for (; X; X = X[V]) {
                if (X.nodeType == 1 && ++U == T) {
                    break
                }
            }
            return X
        };
        o.sibling = function (V, U) {
            var T = [];
            for (; V; V = V.nextSibling) {
                if (V.nodeType == 1 && V != U) {
                    T.push(V)
                }
            }
            return T
        };
        return;
        l.Sizzle = F
    })();
    o.event = {
        add: function (I, F, H, K) {
            if (I.nodeType == 3 || I.nodeType == 8) {
                return
            }
            if (I.setInterval && I != l) {
                I = l
            }
            if (!H.guid) {
                H.guid = this.guid++
            }
            if (K !== g) {
                var G = H;
                H = this.proxy(G);
                H.data = K
            }
            var E = o.data(I, "events") || o.data(I, "events", {}),
                J = o.data(I, "handle") || o.data(I, "handle", function () {
                    return typeof o !== "undefined" && !o.event.triggered ? o.event.handle.apply(arguments.callee.elem, arguments) : g
                });
            J.elem = I;
            o.each(F.split(/\s+/), function (M, N) {
                var O = N.split(".");
                N = O.shift();
                H.type = O.slice().sort().join(".");
                var L = E[N];
                if (o.event.specialAll[N]) {
                    o.event.specialAll[N].setup.call(I, K, O)
                }
                if (!L) {
                    L = E[N] = {};
                    if (!o.event.special[N] || o.event.special[N].setup.call(I, K, O) === false) {
                        if (I.addEventListener) {
                            I.addEventListener(N, J, false)
                        } else {
                            if (I.attachEvent) {
                                I.attachEvent("on" + N, J)
                            }
                        }
                    }
                }
                L[H.guid] = H;
                o.event.global[N] = true
            });
            I = null
        },
        guid: 1,
        global: {},
        remove: function (K, H, J) {
            if (K.nodeType == 3 || K.nodeType == 8) {
                return
            }
            var G = o.data(K, "events"),
                F, E;
            if (G) {
                if (H === g || (typeof H === "string" && H.charAt(0) == ".")) {
                    for (var I in G) {
                        this.remove(K, I + (H || ""))
                    }
                } else {
                    if (H.type) {
                        J = H.handler;
                        H = H.type
                    }
                    o.each(H.split(/\s+/), function (M, O) {
                        var Q = O.split(".");
                        O = Q.shift();
                        var N = RegExp("(^|\\.)" + Q.slice().sort().join(".*\\.") + "(\\.|$)");
                        if (G[O]) {
                            if (J) {
                                delete G[O][J.guid]
                            } else {
                                for (var P in G[O]) {
                                    if (N.test(G[O][P].type)) {
                                        delete G[O][P]
                                    }
                                }
                            }
                            if (o.event.specialAll[O]) {
                                o.event.specialAll[O].teardown.call(K, Q)
                            }
                            for (F in G[O]) {
                                break
                            }
                            if (!F) {
                                if (!o.event.special[O] || o.event.special[O].teardown.call(K, Q) === false) {
                                    if (K.removeEventListener) {
                                        K.removeEventListener(O, o.data(K, "handle"), false)
                                    } else {
                                        if (K.detachEvent) {
                                            K.detachEvent("on" + O, o.data(K, "handle"))
                                        }
                                    }
                                }
                                F = null;
                                delete G[O]
                            }
                        }
                    })
                }
                for (F in G) {
                    break
                }
                if (!F) {
                    var L = o.data(K, "handle");
                    if (L) {
                        L.elem = null
                    }
                    o.removeData(K, "events");
                    o.removeData(K, "handle")
                }
            }
        },
        trigger: function (I, K, H, E) {
            var G = I.type || I;
            if (!E) {
                I = typeof I === "object" ? I[h] ? I : o.extend(o.Event(G), I) : o.Event(G);
                if (G.indexOf("!") >= 0) {
                    I.type = G = G.slice(0, -1);
                    I.exclusive = true
                }
                if (!H) {
                    I.stopPropagation();
                    if (this.global[G]) {
                        o.each(o.cache, function () {
                            if (this.events && this.events[G]) {
                                o.event.trigger(I, K, this.handle.elem)
                            }
                        })
                    }
                }
                if (!H || H.nodeType == 3 || H.nodeType == 8) {
                    return g
                }
                I.result = g;
                I.target = H;
                K = o.makeArray(K);
                K.unshift(I)
            }
            I.currentTarget = H;
            var J = o.data(H, "handle");
            if (J) {
                J.apply(H, K)
            }
            if ((!H[G] || (o.nodeName(H, "a") && G == "click")) && H["on" + G] && H["on" + G].apply(H, K) === false) {
                I.result = false
            }
            if (!E && H[G] && !I.isDefaultPrevented() && !(o.nodeName(H, "a") && G == "click")) {
                this.triggered = true;
                try {
                    H[G]()
                } catch (L) {}
            }
            this.triggered = false;
            if (!I.isPropagationStopped()) {
                var F = H.parentNode || H.ownerDocument;
                if (F) {
                    o.event.trigger(I, K, F, true)
                }
            }
        },
        handle: function (K) {
            var J, E;
            K = arguments[0] = o.event.fix(K || l.event);
            K.currentTarget = this;
            var L = K.type.split(".");
            K.type = L.shift();
            J = !L.length && !K.exclusive;
            var I = RegExp("(^|\\.)" + L.slice().sort().join(".*\\.") + "(\\.|$)");
            E = (o.data(this, "events") || {})[K.type];
            for (var G in E) {
                var H = E[G];
                if (J || I.test(H.type)) {
                    K.handler = H;
                    K.data = H.data;
                    var F = H.apply(this, arguments);
                    if (F !== g) {
                        K.result = F;
                        if (F === false) {
                            K.preventDefault();
                            K.stopPropagation()
                        }
                    }
                    if (K.isImmediatePropagationStopped()) {
                        break
                    }
                }
            }
        },
        props: "altKey attrChange attrName bubbles button cancelable charCode clientX clientY ctrlKey currentTarget data detail eventPhase fromElement handler keyCode metaKey newValue originalTarget pageX pageY prevValue relatedNode relatedTarget screenX screenY shiftKey srcElement target toElement view wheelDelta which".split(" "),
        fix: function (H) {
            if (H[h]) {
                return H
            }
            var F = H;
            H = o.Event(F);
            for (var G = this.props.length, J; G;) {
                J = this.props[--G];
                H[J] = F[J]
            }
            if (!H.target) {
                H.target = H.srcElement || document
            }
            if (H.target.nodeType == 3) {
                H.target = H.target.parentNode
            }
            if (!H.relatedTarget && H.fromElement) {
                H.relatedTarget = H.fromElement == H.target ? H.toElement : H.fromElement
            }
            if (H.pageX == null && H.clientX != null) {
                var I = document.documentElement,
                    E = document.body;
                H.pageX = H.clientX + (I && I.scrollLeft || E && E.scrollLeft || 0) - (I.clientLeft || 0);
                H.pageY = H.clientY + (I && I.scrollTop || E && E.scrollTop || 0) - (I.clientTop || 0)
            }
            if (!H.which && ((H.charCode || H.charCode === 0) ? H.charCode : H.keyCode)) {
                H.which = H.charCode || H.keyCode
            }
            if (!H.metaKey && H.ctrlKey) {
                H.metaKey = H.ctrlKey
            }
            if (!H.which && H.button) {
                H.which = (H.button & 1 ? 1 : (H.button & 2 ? 3 : (H.button & 4 ? 2 : 0)))
            }
            return H
        },
        proxy: function (F, E) {
            E = E ||
            function () {
                return F.apply(this, arguments)
            };
            E.guid = F.guid = F.guid || E.guid || this.guid++;
            return E
        },
        special: {
            ready: {
                setup: B,
                teardown: function () {}
            }
        },
        specialAll: {
            live: {
                setup: function (E, F) {
                    o.event.add(this, F[0], c)
                },
                teardown: function (G) {
                    if (G.length) {
                        var E = 0,
                            F = RegExp("(^|\\.)" + G[0] + "(\\.|$)");
                        o.each((o.data(this, "events").live || {}), function () {
                            if (F.test(this.type)) {
                                E++
                            }
                        });
                        if (E < 1) {
                            o.event.remove(this, G[0], c)
                        }
                    }
                }
            }
        }
    };
    o.Event = function (E) {
        if (!this.preventDefault) {
            return new o.Event(E)
        }
        if (E && E.type) {
            this.originalEvent = E;
            this.type = E.type
        } else {
            this.type = E
        }
        this.timeStamp = e();
        this[h] = true
    };

    function k() {
        return false
    }
    function u() {
        return true
    }
    o.Event.prototype = {
        preventDefault: function () {
            this.isDefaultPrevented = u;
            var E = this.originalEvent;
            if (!E) {
                return
            }
            if (E.preventDefault) {
                E.preventDefault()
            }
            E.returnValue = false
        },
        stopPropagation: function () {
            this.isPropagationStopped = u;
            var E = this.originalEvent;
            if (!E) {
                return
            }
            if (E.stopPropagation) {
                E.stopPropagation()
            }
            E.cancelBubble = true
        },
        stopImmediatePropagation: function () {
            this.isImmediatePropagationStopped = u;
            this.stopPropagation()
        },
        isDefaultPrevented: k,
        isPropagationStopped: k,
        isImmediatePropagationStopped: k
    };
    var a = function (F) {
        var E = F.relatedTarget;
        while (E && E != this) {
            try {
                E = E.parentNode
            } catch (G) {
                E = this
            }
        }
        if (E != this) {
            F.type = F.data;
            o.event.handle.apply(this, arguments)
        }
    };
    o.each({
        mouseover: "mouseenter",
        mouseout: "mouseleave"
    }, function (F, E) {
        o.event.special[E] = {
            setup: function () {
                o.event.add(this, F, a, E)
            },
            teardown: function () {
                o.event.remove(this, F, a)
            }
        }
    });
    o.fn.extend({
        bind: function (F, G, E) {
            return F == "unload" ? this.one(F, G, E) : this.each(function () {
                o.event.add(this, F, E || G, E && G)
            })
        },
        one: function (G, H, F) {
            var E = o.event.proxy(F || H, function (I) {
                o(this).unbind(I, E);
                return (F || H).apply(this, arguments)
            });
            return this.each(function () {
                o.event.add(this, G, E, F && H)
            })
        },
        unbind: function (F, E) {
            return this.each(function () {
                o.event.remove(this, F, E)
            })
        },
        trigger: function (E, F) {
            return this.each(function () {
                o.event.trigger(E, F, this)
            })
        },
        triggerHandler: function (E, G) {
            if (this[0]) {
                var F = o.Event(E);
                F.preventDefault();
                F.stopPropagation();
                o.event.trigger(F, G, this[0]);
                return F.result
            }
        },
        toggle: function (G) {
            var E = arguments,
                F = 1;
            while (F < E.length) {
                o.event.proxy(G, E[F++])
            }
            return this.click(o.event.proxy(G, function (H) {
                this.lastToggle = (this.lastToggle || 0) % F;
                H.preventDefault();
                return E[this.lastToggle++].apply(this, arguments) || false
            }))
        },
        hover: function (E, F) {
            return this.mouseenter(E).mouseleave(F)
        },
        ready: function (E) {
            B();
            if (o.isReady) {
                E.call(document, o)
            } else {
                o.readyList.push(E)
            }
            return this
        },
        live: function (G, F) {
            var E = o.event.proxy(F);
            E.guid += this.selector + G;
            o(document).bind(i(G, this.selector), this.selector, E);
            return this
        },
        die: function (F, E) {
            o(document).unbind(i(F, this.selector), E ? {
                guid: E.guid + this.selector + F
            } : null);
            return this
        }
    });

    function c(H) {
        var E = RegExp("(^|\\.)" + H.type + "(\\.|$)"),
            G = true,
            F = [];
        o.each(o.data(this, "events").live || [], function (I, J) {
            if (E.test(J.type)) {
                var K = o(H.target).closest(J.data)[0];
                if (K) {
                    F.push({
                        elem: K,
                        fn: J
                    })
                }
            }
        });
        F.sort(function (J, I) {
            return o.data(J.elem, "closest") - o.data(I.elem, "closest")
        });
        o.each(F, function () {
            if (this.fn.call(this.elem, H, this.fn.data) === false) {
                return (G = false)
            }
        });
        return G
    }
    function i(F, E) {
        return ["live", F, E.replace(/\./g, "`").replace(/ /g, "|")].join(".")
    }
    o.extend({
        isReady: false,
        readyList: [],
        ready: function () {
            if (!o.isReady) {
                o.isReady = true;
                if (o.readyList) {
                    o.each(o.readyList, function () {
                        this.call(document, o)
                    });
                    o.readyList = null
                }
                o(document).triggerHandler("ready")
            }
        }
    });
    var x = false;

    function B() {
        if (x) {
            return
        }
        x = true;
        if (document.addEventListener) {
            document.addEventListener("DOMContentLoaded", function () {
                document.removeEventListener("DOMContentLoaded", arguments.callee, false);
                o.ready()
            }, false)
        } else {
            if (document.attachEvent) {
                document.attachEvent("onreadystatechange", function () {
                    if (document.readyState === "complete") {
                        document.detachEvent("onreadystatechange", arguments.callee);
                        o.ready()
                    }
                });
                if (document.documentElement.doScroll && l == l.top) {
                    (function () {
                        if (o.isReady) {
                            return
                        }
                        try {
                            document.documentElement.doScroll("left")
                        } catch (E) {
                            setTimeout(arguments.callee, 0);
                            return
                        }
                        o.ready()
                    })()
                }
            }
        }
        o.event.add(l, "load", o.ready)
    }
    o.each(("blur,focus,load,resize,scroll,unload,click,dblclick,mousedown,mouseup,mousemove,mouseover,mouseout,mouseenter,mouseleave,change,select,submit,keydown,keypress,keyup,error").split(","), function (F, E) {
        o.fn[E] = function (G) {
            return G ? this.bind(E, G) : this.trigger(E)
        }
    });
    o(l).bind("unload", function () {
        for (var E in o.cache) {
            if (E != 1 && o.cache[E].handle) {
                o.event.remove(o.cache[E].handle.elem)
            }
        }
    });
    (function () {
        o.support = {};
        var F = document.documentElement,
            G = document.createElement("script"),
            K = document.createElement("div"),
            J = "script" + (new Date).getTime();
        K.style.display = "none";
        K.innerHTML = '   <link/><table></table><a href="/a" style="color:red;float:left;opacity:.5;">a</a><select><option>text</option></select><object><param/></object>';
        var H = K.getElementsByTagName("*"),
            E = K.getElementsByTagName("a")[0];
        if (!H || !H.length || !E) {
            return
        }
        o.support = {
            leadingWhitespace: K.firstChild.nodeType == 3,
            tbody: !K.getElementsByTagName("tbody").length,
            objectAll: !! K.getElementsByTagName("object")[0].getElementsByTagName("*").length,
            htmlSerialize: !! K.getElementsByTagName("link").length,
            style: /red/.test(E.getAttribute("style")),
            hrefNormalized: E.getAttribute("href") === "/a",
            opacity: E.style.opacity === "0.5",
            cssFloat: !! E.style.cssFloat,
            scriptEval: false,
            noCloneEvent: true,
            boxModel: null
        };
        G.type = "text/javascript";
        try {
            G.appendChild(document.createTextNode("window." + J + "=1;"))
        } catch (I) {}
        F.insertBefore(G, F.firstChild);
        if (l[J]) {
            o.support.scriptEval = true;
            delete l[J]
        }
        F.removeChild(G);
        if (K.attachEvent && K.fireEvent) {
            K.attachEvent("onclick", function () {
                o.support.noCloneEvent = false;
                K.detachEvent("onclick", arguments.callee)
            });
            K.cloneNode(true).fireEvent("onclick")
        }
        o(function () {
            var L = document.createElement("div");
            L.style.width = L.style.paddingLeft = "1px";
            document.body.appendChild(L);
            o.boxModel = o.support.boxModel = L.offsetWidth === 2;
            document.body.removeChild(L).style.display = "none"
        })
    })();
    var w = o.support.cssFloat ? "cssFloat" : "styleFloat";
    o.props = {
        "for": "htmlFor",
        "class": "className",
        "float": w,
        cssFloat: w,
        styleFloat: w,
        readonly: "readOnly",
        maxlength: "maxLength",
        cellspacing: "cellSpacing",
        rowspan: "rowSpan",
        tabindex: "tabIndex"
    };
    o.fn.extend({
        _load: o.fn.load,
        load: function (G, J, K) {
            if (typeof G !== "string") {
                return this._load(G)
            }
            var I = G.indexOf(" ");
            if (I >= 0) {
                var E = G.slice(I, G.length);
                G = G.slice(0, I)
            }
            var H = "GET";
            if (J) {
                if (o.isFunction(J)) {
                    K = J;
                    J = null
                } else {
                    if (typeof J === "object") {
                        J = o.param(J);
                        H = "POST"
                    }
                }
            }
            var F = this;
            o.ajax({
                url: G,
                type: H,
                dataType: "html",
                data: J,
                complete: function (M, L) {
                    if (L == "success" || L == "notmodified") {
                        F.html(E ? o("<div/>").append(M.responseText.replace(/<script(.|\s)*?\/script>/g, "")).find(E) : M.responseText)
                    }
                    if (K) {
                        F.each(K, [M.responseText, L, M])
                    }
                }
            });
            return this
        },
        serialize: function () {
            return o.param(this.serializeArray())
        },
        serializeArray: function () {
            return this.map(function () {
                return this.elements ? o.makeArray(this.elements) : this
            }).filter(function () {
                return this.name && !this.disabled && (this.checked || /select|textarea/i.test(this.nodeName) || /text|hidden|password|search/i.test(this.type))
            }).map(function (E, F) {
                var G = o(this).val();
                return G == null ? null : o.isArray(G) ? o.map(G, function (I, H) {
                    return {
                        name: F.name,
                        value: I
                    }
                }) : {
                    name: F.name,
                    value: G
                }
            }).get()
        }
    });
    o.each("ajaxStart,ajaxStop,ajaxComplete,ajaxError,ajaxSuccess,ajaxSend".split(","), function (E, F) {
        o.fn[F] = function (G) {
            return this.bind(F, G)
        }
    });
    var r = e();
    o.extend({
        get: function (E, G, H, F) {
            if (o.isFunction(G)) {
                H = G;
                G = null
            }
            return o.ajax({
                type: "GET",
                url: E,
                data: G,
                success: H,
                dataType: F
            })
        },
        getScript: function (E, F) {
            return o.get(E, null, F, "script")
        },
        getJSON: function (E, F, G) {
            return o.get(E, F, G, "json")
        },
        post: function (E, G, H, F) {
            if (o.isFunction(G)) {
                H = G;
                G = {}
            }
            return o.ajax({
                type: "POST",
                url: E,
                data: G,
                success: H,
                dataType: F
            })
        },
        ajaxSetup: function (E) {
            o.extend(o.ajaxSettings, E)
        },
        ajaxSettings: {
            url: location.href,
            global: true,
            type: "GET",
            contentType: "application/x-www-form-urlencoded",
            processData: true,
            async: true,
            xhr: function () {
                return l.ActiveXObject ? new ActiveXObject("Microsoft.XMLHTTP") : new XMLHttpRequest()
            },
            accepts: {
                xml: "application/xml, text/xml",
                html: "text/html",
                script: "text/javascript, application/javascript",
                json: "application/json, text/javascript",
                text: "text/plain",
                _default: "*/*"
            }
        },
        lastModified: {},
        ajax: function (M) {
            M = o.extend(true, M, o.extend(true, {}, o.ajaxSettings, M));
            var W, F = /=\?(&|$)/g,
                R, V, G = M.type.toUpperCase();
            if (M.data && M.processData && typeof M.data !== "string") {
                M.data = o.param(M.data)
            }
            if (M.dataType == "jsonp") {
                if (G == "GET") {
                    if (!M.url.match(F)) {
                        M.url += (M.url.match(/\?/) ? "&" : "?") + (M.jsonp || "callback") + "=?"
                    }
                } else {
                    if (!M.data || !M.data.match(F)) {
                        M.data = (M.data ? M.data + "&" : "") + (M.jsonp || "callback") + "=?"
                    }
                }
                M.dataType = "json"
            }
            if (M.dataType == "json" && (M.data && M.data.match(F) || M.url.match(F))) {
                W = "jsonp" + r++;
                if (M.data) {
                    M.data = (M.data + "").replace(F, "=" + W + "$1")
                }
                M.url = M.url.replace(F, "=" + W + "$1");
                M.dataType = "script";
                l[W] = function (X) {
                    V = X;
                    I();
                    L();
                    l[W] = g;
                    try {
                        delete l[W]
                    } catch (Y) {}
                    if (H) {
                        H.removeChild(T)
                    }
                }
            }
            if (M.dataType == "script" && M.cache == null) {
                M.cache = false
            }
            if (M.cache === false && G == "GET") {
                var E = e();
                var U = M.url.replace(/(\?|&)_=.*?(&|$)/, "$1_=" + E + "$2");
                M.url = U + ((U == M.url) ? (M.url.match(/\?/) ? "&" : "?") + "_=" + E : "")
            }
            if (M.data && G == "GET") {
                M.url += (M.url.match(/\?/) ? "&" : "?") + M.data;
                M.data = null
            }
            if (M.global && !o.active++) {
                o.event.trigger("ajaxStart")
            }
            var Q = /^(\w+:)?\/\/([^\/?#]+)/.exec(M.url);
            if (M.dataType == "script" && G == "GET" && Q && (Q[1] && Q[1] != location.protocol || Q[2] != location.host)) {
                var H = document.getElementsByTagName("head")[0];
                var T = document.createElement("script");
                T.src = M.url;
                if (M.scriptCharset) {
                    T.charset = M.scriptCharset
                }
                if (!W) {
                    var O = false;
                    T.onload = T.onreadystatechange = function () {
                        if (!O && (!this.readyState || this.readyState == "loaded" || this.readyState == "complete")) {
                            O = true;
                            I();
                            L();
                            T.onload = T.onreadystatechange = null;
                            H.removeChild(T)
                        }
                    }
                }
                H.appendChild(T);
                return g
            }
            var K = false;
            var J = M.xhr();
            if (M.username) {
                J.open(G, M.url, M.async, M.username, M.password)
            } else {
                J.open(G, M.url, M.async)
            }
            try {
                if (M.data) {
                    J.setRequestHeader("Content-Type", M.contentType)
                }
                if (M.ifModified) {
                    J.setRequestHeader("If-Modified-Since", o.lastModified[M.url] || "Thu, 01 Jan 1970 00:00:00 GMT")
                }
                J.setRequestHeader("X-Requested-With", "XMLHttpRequest");
                J.setRequestHeader("Accept", M.dataType && M.accepts[M.dataType] ? M.accepts[M.dataType] + ", */*" : M.accepts._default)
            } catch (S) {}
            if (M.beforeSend && M.beforeSend(J, M) === false) {
                if (M.global && !--o.active) {
                    o.event.trigger("ajaxStop")
                }
                J.abort();
                return false
            }
            if (M.global) {
                o.event.trigger("ajaxSend", [J, M])
            }
            var N = function (X) {
                if (J.readyState == 0) {
                    if (P) {
                        clearInterval(P);
                        P = null;
                        if (M.global && !--o.active) {
                            o.event.trigger("ajaxStop")
                        }
                    }
                } else {
                    if (!K && J && (J.readyState == 4 || X == "timeout")) {
                        K = true;
                        if (P) {
                            clearInterval(P);
                            P = null
                        }
                        R = X == "timeout" ? "timeout" : !o.httpSuccess(J) ? "error" : M.ifModified && o.httpNotModified(J, M.url) ? "notmodified" : "success";
                        if (R == "success") {
                            try {
                                V = o.httpData(J, M.dataType, M)
                            } catch (Z) {
                                R = "parsererror"
                            }
                        }
                        if (R == "success") {
                            var Y;
                            try {
                                Y = J.getResponseHeader("Last-Modified")
                            } catch (Z) {}
                            if (M.ifModified && Y) {
                                o.lastModified[M.url] = Y
                            }
                            if (!W) {
                                I()
                            }
                        } else {
                            o.handleError(M, J, R)
                        }
                        L();
                        if (X) {
                            J.abort()
                        }
                        if (M.async) {
                            J = null
                        }
                    }
                }
            };
            if (M.async) {
                var P = setInterval(N, 13);
                if (M.timeout > 0) {
                    setTimeout(function () {
                        if (J && !K) {
                            N("timeout")
                        }
                    }, M.timeout)
                }
            }
            try {
                J.send(M.data)
            } catch (S) {
                o.handleError(M, J, null, S)
            }
            if (!M.async) {
                N()
            }
            function I() {
                if (M.success) {
                    M.success(V, R)
                }
                if (M.global) {
                    o.event.trigger("ajaxSuccess", [J, M])
                }
            }
            function L() {
                if (M.complete) {
                    M.complete(J, R)
                }
                if (M.global) {
                    o.event.trigger("ajaxComplete", [J, M])
                }
                if (M.global && !--o.active) {
                    o.event.trigger("ajaxStop")
                }
            }
            return J
        },
        handleError: function (F, H, E, G) {
            if (F.error) {
                F.error(H, E, G)
            }
            if (F.global) {
                o.event.trigger("ajaxError", [H, F, G])
            }
        },
        active: 0,
        httpSuccess: function (F) {
            try {
                return !F.status && location.protocol == "file:" || (F.status >= 200 && F.status < 300) || F.status == 304 || F.status == 1223
            } catch (E) {}
            return false
        },
        httpNotModified: function (G, E) {
            try {
                var H = G.getResponseHeader("Last-Modified");
                return G.status == 304 || H == o.lastModified[E]
            } catch (F) {}
            return false
        },
        httpData: function (J, H, G) {
            var F = J.getResponseHeader("content-type"),
                E = H == "xml" || !H && F && F.indexOf("xml") >= 0,
                I = E ? J.responseXML : J.responseText;
            if (E && I.documentElement.tagName == "parsererror") {
                throw "parsererror"
            }
            if (G && G.dataFilter) {
                I = G.dataFilter(I, H)
            }
            if (typeof I === "string") {
                if (H == "script") {
                    o.globalEval(I)
                }
                if (H == "json") {
                    I = l["eval"]("(" + I + ")")
                }
            }
            return I
        },
        param: function (E) {
            var G = [];

            function H(I, J) {
                G[G.length] = encodeURIComponent(I) + "=" + encodeURIComponent(J)
            }
            if (o.isArray(E) || E.jquery) {
                o.each(E, function () {
                    H(this.name, this.value)
                })
            } else {
                for (var F in E) {
                    if (o.isArray(E[F])) {
                        o.each(E[F], function () {
                            H(F, this)
                        })
                    } else {
                        H(F, o.isFunction(E[F]) ? E[F]() : E[F])
                    }
                }
            }
            return G.join("&").replace(/%20/g, "+")
        }
    });
    var m = {},
        n, d = [
            ["height", "marginTop", "marginBottom", "paddingTop", "paddingBottom"],
            ["width", "marginLeft", "marginRight", "paddingLeft", "paddingRight"],
            ["opacity"]
        ];

    function t(F, E) {
        var G = {};
        o.each(d.concat.apply([], d.slice(0, E)), function () {
            G[this] = F
        });
        return G
    }
    o.fn.extend({
        show: function (J, L) {
            if (J) {
                return this.animate(t("show", 3), J, L)
            } else {
                for (var H = 0, F = this.length; H < F; H++) {
                    var E = o.data(this[H], "olddisplay");
                    this[H].style.display = E || "";
                    if (o.css(this[H], "display") === "none") {
                        var G = this[H].tagName,
                            K;
                        if (m[G]) {
                            K = m[G]
                        } else {
                            var I = o("<" + G + " />").appendTo("body");
                            K = I.css("display");
                            if (K === "none") {
                                K = "block"
                            }
                            I.remove();
                            m[G] = K
                        }
                        o.data(this[H], "olddisplay", K)
                    }
                }
                for (var H = 0, F = this.length; H < F; H++) {
                    this[H].style.display = o.data(this[H], "olddisplay") || ""
                }
                return this
            }
        },
        hide: function (H, I) {
            if (H) {
                return this.animate(t("hide", 3), H, I)
            } else {
                for (var G = 0, F = this.length; G < F; G++) {
                    var E = o.data(this[G], "olddisplay");
                    if (!E && E !== "none") {
                        o.data(this[G], "olddisplay", o.css(this[G], "display"))
                    }
                }
                for (var G = 0, F = this.length; G < F; G++) {
                    this[G].style.display = "none"
                }
                return this
            }
        },
        _toggle: o.fn.toggle,
        toggle: function (G, F) {
            var E = typeof G === "boolean";
            return o.isFunction(G) && o.isFunction(F) ? this._toggle.apply(this, arguments) : G == null || E ? this.each(function () {
                var H = E ? G : o(this).is(":hidden");
                o(this)[H ? "show" : "hide"]()
            }) : this.animate(t("toggle", 3), G, F)
        },
        fadeTo: function (E, G, F) {
            return this.animate({
                opacity: G
            }, E, F)
        },
        animate: function (I, F, H, G) {
            var E = o.speed(F, H, G);
            return this[E.queue === false ? "each" : "queue"](function () {
                var K = o.extend({}, E),
                    M, L = this.nodeType == 1 && o(this).is(":hidden"),
                    J = this;
                for (M in I) {
                    if (I[M] == "hide" && L || I[M] == "show" && !L) {
                        return K.complete.call(this)
                    }
                    if ((M == "height" || M == "width") && this.style) {
                        K.display = o.css(this, "display");
                        K.overflow = this.style.overflow
                    }
                }
                if (K.overflow != null) {
                    this.style.overflow = "hidden"
                }
                K.curAnim = o.extend({}, I);
                o.each(I, function (O, S) {
                    var R = new o.fx(J, K, O);
                    if (/toggle|show|hide/.test(S)) {
                        R[S == "toggle" ? L ? "show" : "hide" : S](I)
                    } else {
                        var Q = S.toString().match(/^([+-]=)?([\d+-.]+)(.*)$/),
                            T = R.cur(true) || 0;
                        if (Q) {
                            var N = parseFloat(Q[2]),
                                P = Q[3] || "px";
                            if (P != "px") {
                                J.style[O] = (N || 1) + P;
                                T = ((N || 1) / R.cur(true)) * T;
                                J.style[O] = T + P
                            }
                            if (Q[1]) {
                                N = ((Q[1] == "-=" ? -1 : 1) * N) + T
                            }
                            R.custom(T, N, P)
                        } else {
                            R.custom(T, S, "")
                        }
                    }
                });
                return true
            })
        },
        stop: function (F, E) {
            var G = o.timers;
            if (F) {
                this.queue([])
            }
            this.each(function () {
                for (var H = G.length - 1; H >= 0; H--) {
                    if (G[H].elem == this) {
                        if (E) {
                            G[H](true)
                        }
                        G.splice(H, 1)
                    }
                }
            });
            if (!E) {
                this.dequeue()
            }
            return this
        }
    });
    o.each({
        slideDown: t("show", 1),
        slideUp: t("hide", 1),
        slideToggle: t("toggle", 1),
        fadeIn: {
            opacity: "show"
        },
        fadeOut: {
            opacity: "hide"
        }
    }, function (E, F) {
        o.fn[E] = function (G, H) {
            return this.animate(F, G, H)
        }
    });
    o.extend({
        speed: function (G, H, F) {
            var E = typeof G === "object" ? G : {
                complete: F || !F && H || o.isFunction(G) && G,
                duration: G,
                easing: F && H || H && !o.isFunction(H) && H
            };
            E.duration = o.fx.off ? 0 : typeof E.duration === "number" ? E.duration : o.fx.speeds[E.duration] || o.fx.speeds._default;
            E.old = E.complete;
            E.complete = function () {
                if (E.queue !== false) {
                    o(this).dequeue()
                }
                if (o.isFunction(E.old)) {
                    E.old.call(this)
                }
            };
            return E
        },
        easing: {
            linear: function (G, H, E, F) {
                return E + F * G
            },
            swing: function (G, H, E, F) {
                return ((-Math.cos(G * Math.PI) / 2) + 0.5) * F + E
            }
        },
        timers: [],
        fx: function (F, E, G) {
            this.options = E;
            this.elem = F;
            this.prop = G;
            if (!E.orig) {
                E.orig = {}
            }
        }
    });
    o.fx.prototype = {
        update: function () {
            if (this.options.step) {
                this.options.step.call(this.elem, this.now, this)
            }(o.fx.step[this.prop] || o.fx.step._default)(this);
            if ((this.prop == "height" || this.prop == "width") && this.elem.style) {
                this.elem.style.display = "block"
            }
        },
        cur: function (F) {
            if (this.elem[this.prop] != null && (!this.elem.style || this.elem.style[this.prop] == null)) {
                return this.elem[this.prop]
            }
            var E = parseFloat(o.css(this.elem, this.prop, F));
            return E && E > -10000 ? E : parseFloat(o.curCSS(this.elem, this.prop)) || 0
        },
        custom: function (I, H, G) {
            this.startTime = e();
            this.start = I;
            this.end = H;
            this.unit = G || this.unit || "px";
            this.now = this.start;
            this.pos = this.state = 0;
            var E = this;

            function F(J) {
                return E.step(J)
            }
            F.elem = this.elem;
            if (F() && o.timers.push(F) && !n) {
                n = setInterval(function () {
                    var K = o.timers;
                    for (var J = 0; J < K.length; J++) {
                        if (!K[J]()) {
                            K.splice(J--, 1)
                        }
                    }
                    if (!K.length) {
                        clearInterval(n);
                        n = g
                    }
                }, 13)
            }
        },
        show: function () {
            this.options.orig[this.prop] = o.attr(this.elem.style, this.prop);
            this.options.show = true;
            this.custom(this.prop == "width" || this.prop == "height" ? 1 : 0, this.cur());
            o(this.elem).show()
        },
        hide: function () {
            this.options.orig[this.prop] = o.attr(this.elem.style, this.prop);
            this.options.hide = true;
            this.custom(this.cur(), 0)
        },
        step: function (H) {
            var G = e();
            if (H || G >= this.options.duration + this.startTime) {
                this.now = this.end;
                this.pos = this.state = 1;
                this.update();
                this.options.curAnim[this.prop] = true;
                var E = true;
                for (var F in this.options.curAnim) {
                    if (this.options.curAnim[F] !== true) {
                        E = false
                    }
                }
                if (E) {
                    if (this.options.display != null) {
                        this.elem.style.overflow = this.options.overflow;
                        this.elem.style.display = this.options.display;
                        if (o.css(this.elem, "display") == "none") {
                            this.elem.style.display = "block"
                        }
                    }
                    if (this.options.hide) {
                        o(this.elem).hide()
                    }
                    if (this.options.hide || this.options.show) {
                        for (var I in this.options.curAnim) {
                            o.attr(this.elem.style, I, this.options.orig[I])
                        }
                    }
                    this.options.complete.call(this.elem)
                }
                return false
            } else {
                var J = G - this.startTime;
                this.state = J / this.options.duration;
                this.pos = o.easing[this.options.easing || (o.easing.swing ? "swing" : "linear")](this.state, J, 0, 1, this.options.duration);
                this.now = this.start + ((this.end - this.start) * this.pos);
                this.update()
            }
            return true
        }
    };
    o.extend(o.fx, {
        speeds: {
            slow: 600,
            fast: 200,
            _default: 400
        },
        step: {
            opacity: function (E) {
                o.attr(E.elem.style, "opacity", E.now)
            },
            _default: function (E) {
                if (E.elem.style && E.elem.style[E.prop] != null) {
                    E.elem.style[E.prop] = E.now + E.unit
                } else {
                    E.elem[E.prop] = E.now
                }
            }
        }
    });
    if (document.documentElement.getBoundingClientRect) {
        o.fn.offset = function () {
            if (!this[0]) {
                return {
                    top: 0,
                    left: 0
                }
            }
            if (this[0] === this[0].ownerDocument.body) {
                return o.offset.bodyOffset(this[0])
            }
            var G = this[0].getBoundingClientRect(),
                J = this[0].ownerDocument,
                F = J.body,
                E = J.documentElement,
                L = E.clientTop || F.clientTop || 0,
                K = E.clientLeft || F.clientLeft || 0,
                I = G.top + (self.pageYOffset || o.boxModel && E.scrollTop || F.scrollTop) - L,
                H = G.left + (self.pageXOffset || o.boxModel && E.scrollLeft || F.scrollLeft) - K;
            return {
                top: I,
                left: H
            }
        }
    } else {
        o.fn.offset = function () {
            if (!this[0]) {
                return {
                    top: 0,
                    left: 0
                }
            }
            if (this[0] === this[0].ownerDocument.body) {
                return o.offset.bodyOffset(this[0])
            }
            o.offset.initialized || o.offset.initialize();
            var J = this[0],
                G = J.offsetParent,
                F = J,
                O = J.ownerDocument,
                M, H = O.documentElement,
                K = O.body,
                L = O.defaultView,
                E = L.getComputedStyle(J, null),
                N = J.offsetTop,
                I = J.offsetLeft;
            while ((J = J.parentNode) && J !== K && J !== H) {
                M = L.getComputedStyle(J, null);
                N -= J.scrollTop,
                I -= J.scrollLeft;
                if (J === G) {
                    N += J.offsetTop,
                    I += J.offsetLeft;
                    if (o.offset.doesNotAddBorder && !(o.offset.doesAddBorderForTableAndCells && /^t(able|d|h)$/i.test(J.tagName))) {
                        N += parseInt(M.borderTopWidth, 10) || 0,
                        I += parseInt(M.borderLeftWidth, 10) || 0
                    }
                    F = G,
                    G = J.offsetParent
                }
                if (o.offset.subtractsBorderForOverflowNotVisible && M.overflow !== "visible") {
                    N += parseInt(M.borderTopWidth, 10) || 0,
                    I += parseInt(M.borderLeftWidth, 10) || 0
                }
                E = M
            }
            if (E.position === "relative" || E.position === "static") {
                N += K.offsetTop,
                I += K.offsetLeft
            }
            if (E.position === "fixed") {
                N += Math.max(H.scrollTop, K.scrollTop),
                I += Math.max(H.scrollLeft, K.scrollLeft)
            }
            return {
                top: N,
                left: I
            }
        }
    }
    o.offset = {
        initialize: function () {
            if (this.initialized) {
                return
            }
            var L = document.body,
                F = document.createElement("div"),
                H, G, N, I, M, E, J = L.style.marginTop,
                K = '<div style="position:absolute;top:0;left:0;margin:0;border:5px solid #000;padding:0;width:1px;height:1px;"><div></div></div><table style="position:absolute;top:0;left:0;margin:0;border:5px solid #000;padding:0;width:1px;height:1px;" cellpadding="0" cellspacing="0"><tr><td></td></tr></table>';
            M = {
                position: "absolute",
                top: 0,
                left: 0,
                margin: 0,
                border: 0,
                width: "1px",
                height: "1px",
                visibility: "hidden"
            };
            for (E in M) {
                F.style[E] = M[E]
            }
            F.innerHTML = K;
            L.insertBefore(F, L.firstChild);
            H = F.firstChild,
            G = H.firstChild,
            I = H.nextSibling.firstChild.firstChild;
            this.doesNotAddBorder = (G.offsetTop !== 5);
            this.doesAddBorderForTableAndCells = (I.offsetTop === 5);
            H.style.overflow = "hidden",
            H.style.position = "relative";
            this.subtractsBorderForOverflowNotVisible = (G.offsetTop === -5);
            L.style.marginTop = "1px";
            this.doesNotIncludeMarginInBodyOffset = (L.offsetTop === 0);
            L.style.marginTop = J;
            L.removeChild(F);
            this.initialized = true
        },
        bodyOffset: function (E) {
            o.offset.initialized || o.offset.initialize();
            var G = E.offsetTop,
                F = E.offsetLeft;
            if (o.offset.doesNotIncludeMarginInBodyOffset) {
                G += parseInt(o.curCSS(E, "marginTop", true), 10) || 0,
                F += parseInt(o.curCSS(E, "marginLeft", true), 10) || 0
            }
            return {
                top: G,
                left: F
            }
        }
    };
    o.fn.extend({
        position: function () {
            var I = 0,
                H = 0,
                F;
            if (this[0]) {
                var G = this.offsetParent(),
                    J = this.offset(),
                    E = /^body|html$/i.test(G[0].tagName) ? {
                        top: 0,
                        left: 0
                    } : G.offset();
                J.top -= j(this, "marginTop");
                J.left -= j(this, "marginLeft");
                E.top += j(G, "borderTopWidth");
                E.left += j(G, "borderLeftWidth");
                F = {
                    top: J.top - E.top,
                    left: J.left - E.left
                }
            }
            return F
        },
        offsetParent: function () {
            var E = this[0].offsetParent || document.body;
            while (E && (!/^body|html$/i.test(E.tagName) && o.css(E, "position") == "static")) {
                E = E.offsetParent
            }
            return o(E)
        }
    });
    o.each(["Left", "Top"], function (F, E) {
        var G = "scroll" + E;
        o.fn[G] = function (H) {
            if (!this[0]) {
                return null
            }
            return H !== g ? this.each(function () {
                this == l || this == document ? l.scrollTo(!F ? H : o(l).scrollLeft(), F ? H : o(l).scrollTop()) : this[G] = H
            }) : this[0] == l || this[0] == document ? self[F ? "pageYOffset" : "pageXOffset"] || o.boxModel && document.documentElement[G] || document.body[G] : this[0][G]
        }
    });
    o.each(["Height", "Width"], function (I, G) {
        var E = I ? "Left" : "Top",
            H = I ? "Right" : "Bottom",
            F = G.toLowerCase();
        o.fn["inner" + G] = function () {
            return this[0] ? o.css(this[0], F, false, "padding") : null
        };
        o.fn["outer" + G] = function (K) {
            return this[0] ? o.css(this[0], F, false, K ? "margin" : "border") : null
        };
        var J = G.toLowerCase();
        o.fn[J] = function (K) {
            return this[0] == l ? document.compatMode == "CSS1Compat" && document.documentElement["client" + G] || document.body["client" + G] : this[0] == document ? Math.max(document.documentElement["client" + G], document.body["scroll" + G], document.documentElement["scroll" + G], document.body["offset" + G], document.documentElement["offset" + G]) : K === g ? (this.length ? o.css(this[0], J) : null) : this.css(J, typeof K === "string" ? K : K + "px")
        }
    })
})(); /* fim jquery-1.3.2.min.js */

/* flash.js */
var MM_contentVersion = 6;
var plugin = (navigator.mimeTypes && navigator.mimeTypes["application/x-shockwave-flash"]) ? navigator.mimeTypes["application/x-shockwave-flash"].enabledPlugin : 0;
if (plugin) {
    var words = navigator.plugins["Shockwave Flash"].description.split(" ");
    for (var i = 0; i < words.length; ++i) {
        if (isNaN(parseInt(words[i]))) {
            continue
        }
        var MM_PluginVersion = words[i]
    }
    var MM_FlashCanPlay = MM_PluginVersion >= MM_contentVersion
} else {
    if (navigator.userAgent && navigator.userAgent.indexOf("MSIE") >= 0 && (navigator.appVersion.indexOf("Win") != -1)) {
        document.write("<SCRIPT LANGUAGE=VBScript> \n");
        document.write("on error resume next \n");
        document.write('MM_FlashCanPlay = ( IsObject(CreateObject("ShockwaveFlash.ShockwaveFlash." & MM_contentVersion)))\n');
        document.write("<\/SCRIPT> \n")
    }
}
if (Browser == undefined) {
    var Browser = {
        isIE: function () {
            return (window.ActiveXObject && document.all && navigator.userAgent.toLowerCase().indexOf("msie") > -1 && navigator.userAgent.toLowerCase().indexOf("opera") == -1) ? true : false
        }
    }
}
var Flash = function (b, g, d, a, f) {
    this.html = "";
    this.attributes = this.params = this.variables = null;
    this.variables = new Array();
    var e = (("https:" == document.location.protocol) ? "https://" : "http://");
    this.attributes = {
        classid: "clsid:D27CDB6E-AE6D-11cf-96B8-444553540000",
        codebase: e + "fpdownload.macromedia.com/get/flashplayer/current/swflash.cab#version=8,0,22,0",
        type: "application/x-shockwave-flash"
    };
    this.params = {
        pluginurl: e + "www.macromedia.com/go/getflashplayer_br"
    };
    if (b) {
        this.addAttribute("data", b);
        this.addParameter("movie", b)
    }
    if (g && g != null) {
        this.addAttribute("id", g)
    }
    if (d) {
        this.addAttribute("width", d)
    }
    if (a) {
        this.addAttribute("height", a)
    }
    if (f != undefined) {
        for (var c in f) {
            this.addParameter(c.toString(), f[c])
        }
    }
};
Flash.version = "1.2b";
Flash.getObjectByExceptions = function (f, e) {
    var b = {};
    for (var d in f) {
        var a = true;
        for (var c = 0; c < e.length; c++) {
            if (e[c] == d.toString()) {
                a = false;
                break
            }
        }
        if (a) {
            b[d] = f[d]
        }
    }
    return b
};
Flash.prototype.addAttribute = function (b, a) {
    this.attributes[b] = a
};
Flash.prototype.addParameter = function (b, a) {
    this.params[b] = a
};
Flash.prototype.addVariable = function (b, a) {
    this.variables.push([b, a])
};
Flash.prototype.getFlashVars = function () {
    var b = new Array();
    for (var a = 0; a < this.variables.length; a++) {
        b.push(this.variables[a].join("="))
    }
    return b.join("&")
};
Flash.prototype.toString = function () {
    this.params.flashVars = this.getFlashVars();
    if (Browser.isIE()) {
        this.html = "<object";
        var a = Flash.getObjectByExceptions(this.attributes, ["type", "data"]);
        for (var b in a) {
            if (b.toString() != "extend") {
                this.html += " " + b.toString() + ' = "' + a[b] + '"'
            }
        }
        this.html += "> ";
        var c = Flash.getObjectByExceptions(this.params, ["pluginurl", "extend"]);
        for (var b in c) {
            if (b.toString() != "extend") {
                this.html += '<param name="' + b.toString() + '" value="' + c[b] + '" /> '
            }
        }
        this.html += " </object>"
    } else {
        this.html = "<!--[if !IE]> <--> <object";
        var a = Flash.getObjectByExceptions(this.attributes, ["classid", "codebase"]);
        for (var b in a) {
            if (b.toString() != "extend") {
                this.html += " " + b.toString() + ' = "' + a[b] + '"'
            }
        }
        this.html += "> ";
        var c = Flash.getObjectByExceptions(this.params, ["extend"]);
        for (var b in c) {
            if (b.toString() != "extend") {
                this.html += '<param name="' + b.toString() + '" value="' + c[b] + '" /> '
            }
        }
        this.html += " </object> <!--> <![endif]-->"
    }
    return this.html
};
Flash.prototype.write = Flash.prototype.outIn = Flash.prototype.writeIn = function (a) {
    if (typeof a == "string" && document.getElementById) {
        var a = document.getElementById(a)
    }
    if (a != undefined && a) {
        a.innerHTML = this.toString()
    } else {
        document.write(this.toString())
    }
}; /* fim flash.js */

/* Cookie */
/*!
 * jQuery Cookie Plugin
 * https://github.com/carhartl/jquery-cookie
 *
 * Copyright 2011, Klaus Hartl
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.opensource.org/licenses/GPL-2.0
 */
(function($) {
    $.cookie = function(key, value, options) {

        // key and at least value given, set cookie...
        if (arguments.length > 1 && (!/Object/.test(Object.prototype.toString.call(value)) || value === null || value === undefined)) {
            options = $.extend({}, options);

            if (value === null || value === undefined) {
                options.expires = -1;
            }

            if (typeof options.expires === 'number') {
                var days = options.expires, t = options.expires = new Date();
                t.setDate(t.getDate() + days);
            }

            value = String(value);

            return (document.cookie = [
                encodeURIComponent(key), '=', options.raw ? value : encodeURIComponent(value),
                options.expires ? '; expires=' + options.expires.toUTCString() : '', // use expires attribute, max-age is not supported by IE
                options.path    ? '; path=' + options.path : '',
                options.domain  ? '; domain=' + options.domain : '',
                options.secure  ? '; secure' : ''
            ].join(''));
        }

        // key and possibly options given, get cookie...
        options = value || {};
        var decode = options.raw ? function(s) { return s; } : decodeURIComponent;

        var pairs = document.cookie.split('; ');
        for (var i = 0, pair; pair = pairs[i] && pairs[i].split('='); i++) {
            if (decode(pair[0]) === key) return decode(pair[1] || ''); // IE saves cookies with empty string as "c; ", e.g. without "=" as opposed to EOMB, thus pair[1] may be undefined
        }
        return null;
    };
})(jQuery);
/* Cookie */

/* jquery.suggest.js */
var ObjetoSelected = false;
(function (a) {
    a.suggest = function (o, g) {
        var c = a(o).attr("autocomplete", "off");
        var f = a(document.createElement("ul"));
        var n = false;
        var d = 0;
        var q = [];
        var p = 0;
        f.addClass(g.resultsClass).appendTo("body");		
		
        j();
        a(window).load(j).resize(j);
        c.blur(function () {
            setTimeout(function () {
                f.hide()
            }, 200)
        });
        try {
            f.bgiframe()
        } catch (s) {}
        if (a.browser.mozilla) {
            c.keypress(m)
        } else {
            c.keydown(m)
        }
        function j() {
            var e = c.offset();
            f.css({
                top		: (e.top + o.offsetHeight) + "px",
                left	: e.left + "px",
				width	: $(o).width() + "px"
            });
        }
        function m(w) {
            if ((/27$|38$|40$/.test(w.keyCode) && f.is(":visible")) || (/^13$|^9$/.test(w.keyCode) && u())) {
                if (w.preventDefault) {
                    w.preventDefault()
                }
                if (w.stopPropagation) {
                    w.stopPropagation()
                }
                w.cancelBubble = true;
                w.returnValue = false;
				
                switch (w.keyCode) {
                case 38:
                    k();
                    break;
                case 40:
                    t();
                    break;
                case 9:
                case 13:
                    r();
                    break;
                case 27:
                    f.hide();
                    break
                }
            } else {
                if (c.val().length != d) {
                    if (n) {
                        clearTimeout(n)
                    }
                    n = setTimeout(l, g.delay);
                    d = c.val().length
                }
            }
        }
        function l() {
            var e = a.trim(c.val());
            if (e.length >= g.minchars) {
                cached = v(e);
                if (cached) {
                    i(cached.items)
                } else {
                    a.get(g.source, {
                        q: e
                    }, function (w) {
                        f.hide();
                        var x = b(w, e);
                        i(x);
                        h(e, x, w.length)
                    })
                }
            } else {
                f.hide()
            }
        }
        function v(w) {
            for (var e = 0; e < q.length; e++) {
                if (q[e]["q"] == w) {
                    q.unshift(q.splice(e, 1)[0]);
                    return q[0]
                }
            }
            return false
        }
        function h(y, e, w) {
            while (q.length && (p + w > g.maxCacheSize)) {
                var x = q.pop();
                p -= x.size
            }
            q.push({
                q: y,
                size: w,
                items: e
            });
            p += w
        }
        function i(e) {
            if (!e) {
                return
            }
            if (!e.length) {
                f.hide();
                return
            }
            var x = "";
			
			var hasSuggests = false;
			for (var w = 0; w < e.length; w++) {
				if( e[w].indexOf('<div class="imagem">') == -1 ){
					hasSuggests = true;
				}                
            }
			if(hasSuggests){
				x += "<div class='label' >Sugest&otilde;es de busca</div>";
			}
			for (var w = 0; w < e.length; w++) {
				if( e[w].indexOf('<div class="imagem">') == -1 ){
					x += "<li class='li_sugestao'>" + e[w] + "</li>"
				}                
            }
			
			x += "<div class='label' >Produtos</div>";
			
            for (var w = 0; w < e.length; w++) {
				if( e[w].indexOf('<div class="imagem">') != -1 ){
					x += "<li>" + e[w] + "</li>"
				}                
            }
			
			f.children("li").each(function(){							
                f.children("li").attr('codigo', $("div",this).attr('codigo'));
			});
			
            f.html(x).show();
            f.children("li").mouseover(function () {
				 f.children("li").removeClass(g.selectClass);
                a(this).addClass(g.selectClass);
            }).click(function (y) {
                y.preventDefault();
                y.stopPropagation();
                r()
            })
        }
        function b(e, z) {
            var w = [];
            var A = e.split(g.delimiter);
            for (var y = 0; y < A.length; y++) {
                var x = a.trim(A[y]);
                if (x) {
					
					var Dados = x.split('=');					
					
					Nome 		= Dados[0];
					Src  		= Dados[1];
					Codigo  	= Dados[2];
					Tipo		= Dados[3];
					
					var Termos 	= z.replace(/\s/g,"|");
							
					Nome = Nome.replace(new RegExp(Termos, "gi"), function(B) {	
						return '<span class="' + g.matchClass + '">' + B + '</span>';
					});
					
					if(Tipo == 1){
						w[w.length] = '<div codigo="'+Codigo+'" class="container_sugestoes">'
									+ '<div class="nome">'+Nome+'</div>'
									+ '</div>'; 
					}else{
						w[w.length] = '<div codigo="'+Codigo+'" class="container">'
									+ '<div class="imagem"><img src="'+Src+'" height="50" width="50" /></div>'
									+ '<div class="nome">'+Nome+'</div>'
									+ '</div>'; 

					}
                }
            }
            return w
        }
        function u() {
            if (!f.is(":visible")) {
                return false
            }
            var e = f.children("li." + g.selectClass);
		
            if (!e.length) {
                e = false
            }
            return e
        }
        function r() {
            $currentResult = u();
            if ($currentResult) {
				ObjetoSelected = $currentResult;
                f.hide();
                if (g.onSelect) {
                    g.onSelect.apply(c[0])
                }
            }
        }
        function t() {
            $currentResult = u();			
			var Max = $('.ac_results li').size();			
            if ($currentResult) {
				ObjetoSelected = $currentResult;				
				var Index = false;
				$('ul.ac_results li').each(function(i){
					if($(this).hasClass(g.selectClass)){						
						Index = i+1;
						$(this).removeClass(g.selectClass);						
					}
				});				
				$('.ac_results li:eq('+Index+')').addClass(g.selectClass);				
            } else {
                f.children(".label:first-child").next(".ac_results li").addClass(g.selectClass)
            }
        }
        function k() {
            $currentResult = u();			
			var Max = $('.ac_results li').size();			
            if ($currentResult) {
				ObjetoSelected = $currentResult;				
				var Index = false;
				$('ul.ac_results li').each(function(i){
					if($(this).hasClass(g.selectClass)){						
						Index = i-1;
						$(this).removeClass(g.selectClass);						
					}
				});				
				$('.ac_results li:eq('+Index+')').addClass(g.selectClass);
            } else {
                f.children("li:last-child").addClass(g.selectClass)
            }
        }
    };
    a.fn.suggest = function (c, b) {
        if (!c) {
            return
        }
        b = b || {};
        b.source = c;
        b.delay = b.delay || 100;
        b.resultsClass = b.resultsClass || "ac_results";
        b.selectClass = b.selectClass || "ac_over";
        b.matchClass = b.matchClass || "ac_match";
        b.minchars = b.minchars || 2;
        b.delimiter = b.delimiter || "<br/>";
        b.onSelect = b.onSelect || false;
        b.maxCacheSize = b.maxCacheSize || 65536;
        this.each(function () {
            new a.suggest(this, b)
        });
        return this
    }
})(jQuery); /* fim jquery.suggest.js */

/* jquery.blockUI.js */
(function (g) {
    if (/1\.(0|1|2)\.(0|1|2)/.test(g.fn.jquery) || /^1.1/.test(g.fn.jquery)) {
        alert("blockUI requires jQuery v1.2.3 or later!  You are using v" + g.fn.jquery);
        return
    }
    g.fn._fadeIn = g.fn.fadeIn;
    var i = document.documentMode || 0;
    var d = g.browser.msie && ((g.browser.version < 8 && !i) || i < 8);
    var e = g.browser.msie && /MSIE 6.0/.test(navigator.userAgent) && !i;
    g.blockUI = function (o) {
        c(window, o)
    };
    g.unblockUI = function (o) {
        h(window, o)
    };
    g.growlUI = function (s, q, r, o) {
        var p = g('<div class="growlUI"></div>');
        if (s) {
            p.append("<h1>" + s + "</h1>")
        }
        if (q) {
            p.append("<h2>" + q + "</h2>")
        }
        if (r == undefined) {
            r = 3000
        }
        g.blockUI({
            message: p,
            fadeIn: 700,
            fadeOut: 1000,
            centerY: false,
            timeout: r,
            showOverlay: false,
            onUnblock: o,
            css: g.blockUI.defaults.growlCSS
        })
    };
    g.fn.block = function (o) {
        return this.unblock({
            fadeOut: 0
        }).each(function () {
            if (g.css(this, "position") == "static") {
                this.style.position = "relative"
            }
            if (g.browser.msie) {
                this.style.zoom = 1
            }
            c(this, o)
        })
    };
    g.fn.unblock = function (o) {
        return this.each(function () {
            h(this, o)
        })
    };
    g.blockUI.version = 2.26;
    g.blockUI.defaults = {
        message: "<h1>Please wait...</h1>",
        title: null,
        draggable: true,
        theme: false,
        css: {
            padding: "10px",
            margin: 0,
            width: "30%",
            top: "40%",
            left: "35%",
            textAlign: "center",
            color: "#fff",
            border: "none",
            backgroundColor: "#000",
            cursor: "default",
            "-webkit-border-radius": "10px",
            "-moz-border-radius": "10px",
            opacity: 0.6
        },
        themedCSS: {
            width: "30%",
            top: "40%",
            left: "35%"
        },
        overlayCSS: {
            backgroundColor: "#000",
            opacity: 0.6,
            cursor: "default"
        },
        growlCSS: {
            width: "350px",
            top: "10px",
            left: "",
            right: "10px",
            border: "none",
            padding: "5px",
            opacity: 0.6,
            cursor: "default",
            color: "#fff",
            backgroundColor: "#000",
            "-webkit-border-radius": "10px",
            "-moz-border-radius": "10px"
        },
        iframeSrc: /^https/i.test(window.location.href || "") ? "javascript:false" : "about:blank",
        forceIframe: false,
        baseZ: 1000,
        centerX: true,
        centerY: true,
        allowBodyStretch: true,
        bindEvents: true,
        constrainTabKey: true,
        fadeIn: 200,
        fadeOut: 400,
        timeout: 0,
        showOverlay: true,
        focusInput: true,
        applyPlatformOpacityRules: true,
        onUnblock: null,
        quirksmodeOffsetHack: 4
    };
    var b = null;
    var f = [];

    function c(o, B) {
        var v = (o == window);
        var r = B && B.message !== undefined ? B.message : undefined;
        B = g.extend({}, g.blockUI.defaults, B || {});
        B.overlayCSS = g.extend({}, g.blockUI.defaults.overlayCSS, B.overlayCSS || {});
        var x = g.extend({}, g.blockUI.defaults.css, B.css || {});
        var I = g.extend({}, g.blockUI.defaults.themedCSS, B.themedCSS || {});
        r = r === undefined ? B.message : r;
        if (v && b) {
            h(window, {
                fadeOut: 0
            })
        }
        if (r && typeof r != "string" && (r.parentNode || r.jquery)) {
            var D = r.jquery ? r[0] : r;
            var J = {};
            g(o).data("blockUI.history", J);
            J.el = D;
            J.parent = D.parentNode;
            J.display = D.style.display;
            J.position = D.style.position;
            if (J.parent) {
                J.parent.removeChild(D)
            }
        }
        var w = B.baseZ;
        var H = (g.browser.msie || B.forceIframe) ? g('<iframe class="blockUI" style="z-index:' + (w++) + ';display:none;border:none;margin:0;padding:0;position:absolute;width:100%;height:100%;top:0;left:0" src="' + B.iframeSrc + '"></iframe>') : g('<div class="blockUI" style="display:none"></div>');
        var G = g('<div class="blockUI blockOverlay" style="z-index:' + (w++) + ';display:none;border:none;margin:0;padding:0;width:100%;height:100%;top:0;left:0"></div>');
        var F;
        if (B.theme && v) {
            var C = '<div class="blockUI blockMsg blockPage ui-dialog ui-widget ui-corner-all" style="z-index:' + w + ';display:none;position:fixed"><div class="ui-widget-header ui-dialog-titlebar blockTitle">' + (B.title || "&nbsp;") + '</div><div class="ui-widget-content ui-dialog-content"></div></div>';
            F = g(C)
        } else {
            F = v ? g('<div class="blockUI blockMsg blockPage" style="z-index:' + w + ';display:none;position:fixed"></div>') : g('<div class="blockUI blockMsg blockElement" style="z-index:' + w + ';display:none;position:absolute"></div>')
        }
        if (r) {
            if (B.theme) {
                F.css(I);
                F.addClass("ui-widget-content")
            } else {
                F.css(x)
            }
        }
        if (!B.applyPlatformOpacityRules || !(g.browser.mozilla && /Linux/.test(navigator.platform))) {
            G.css(B.overlayCSS)
        }
        G.css("position", v ? "fixed" : "absolute");
        if (g.browser.msie || B.forceIframe) {
            H.css("opacity", 0)
        }
        g([H[0], G[0], F[0]]).appendTo(v ? "body" : o);
        if (B.theme && B.draggable && g.fn.draggable) {
            F.draggable({
                handle: ".ui-dialog-titlebar",
                cancel: "li"
            })
        }
        var q = d && (!g.boxModel || g("object,embed", v ? null : o).length > 0);
        if (e || q) {
            if (v && B.allowBodyStretch && g.boxModel) {
                g("html,body").css("height", "100%")
            }
            if ((e || !g.boxModel) && !v) {
                var A = l(o, "borderTopWidth"),
                    E = l(o, "borderLeftWidth");
                var u = A ? "(0 - " + A + ")" : 0;
                var y = E ? "(0 - " + E + ")" : 0
            }
            g.each([H, G, F], function (t, M) {
                var z = M[0].style;
                z.position = "absolute";
                if (t < 2) {
                    v ? z.setExpression("height", "Math.max(document.body.scrollHeight, document.body.offsetHeight) - (jQuery.boxModel?0:" + B.quirksmodeOffsetHack + ') + "px"') : z.setExpression("height", 'this.parentNode.offsetHeight + "px"');
                    v ? z.setExpression("width", 'jQuery.boxModel && document.documentElement.clientWidth || document.body.clientWidth + "px"') : z.setExpression("width", 'this.parentNode.offsetWidth + "px"');
                    if (y) {
                        z.setExpression("left", y)
                    }
                    if (u) {
                        z.setExpression("top", u)
                    }
                } else {
                    if (B.centerY) {
                        if (v) {
                            z.setExpression("top", '(document.documentElement.clientHeight || document.body.clientHeight) / 2 - (this.offsetHeight / 2) + (blah = document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop) + "px"')
                        }
                        z.marginTop = 0
                    } else {
                        if (!B.centerY && v) {
                            var K = (B.css && B.css.top) ? parseInt(B.css.top) : 0;
                            var L = "((document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop) + " + K + ') + "px"';
                            z.setExpression("top", L)
                        }
                    }
                }
            })
        }
        if (r) {
            if (B.theme) {
                F.find(".ui-widget-content").append(r)
            } else {
                F.append(r)
            }
            if (r.jquery || r.nodeType) {
                g(r).show()
            }
        }
        if ((g.browser.msie || B.forceIframe) && B.showOverlay) {
            H.show()
        }
        if (B.fadeIn) {
            if (B.showOverlay) {
                G._fadeIn(B.fadeIn)
            }
            if (r) {
                F.fadeIn(B.fadeIn)
            }
        } else {
            if (B.showOverlay) {
                G.show()
            }
            if (r) {
                F.show()
            }
        }
        k(1, o, B);
        if (v) {
            b = F[0];
            f = g(":input:enabled:visible", b);
            if (B.focusInput) {
                setTimeout(n, 20)
            }
        } else {
            a(F[0], B.centerX, B.centerY)
        }
        if (B.timeout) {
            var p = setTimeout(function () {
                v ? g.unblockUI(B) : g(o).unblock(B)
            }, B.timeout);
            g(o).data("blockUI.timeout", p)
        }
    }
    function h(r, s) {
        var q = (r == window);
        var p = g(r);
        var t = p.data("blockUI.history");
        var u = p.data("blockUI.timeout");
        if (u) {
            clearTimeout(u);
            p.removeData("blockUI.timeout")
        }
        s = g.extend({}, g.blockUI.defaults, s || {});
        k(0, r, s);
        var o;
        if (q) {
            o = g("body").children().filter(".blockUI").add("body > .blockUI")
        } else {
            o = g(".blockUI", r)
        }
        if (q) {
            b = f = null
        }
        if (s.fadeOut) {
            o.fadeOut(s.fadeOut);
            setTimeout(function () {
                j(o, t, s, r)
            }, s.fadeOut)
        } else {
            j(o, t, s, r)
        }
    }
    function j(o, r, q, p) {
        o.each(function (s, t) {
            if (this.parentNode) {
                this.parentNode.removeChild(this)
            }
        });
        if (r && r.el) {
            r.el.style.display = r.display;
            r.el.style.position = r.position;
            if (r.parent) {
                r.parent.appendChild(r.el)
            }
            g(r.el).removeData("blockUI.history")
        }
        if (typeof q.onUnblock == "function") {
            q.onUnblock(p, q)
        }
    }
    function k(o, s, t) {
        var r = s == window,
            q = g(s);
        if (!o && (r && !b || !r && !q.data("blockUI.isBlocked"))) {
            return
        }
        if (!r) {
            q.data("blockUI.isBlocked", o)
        }
        if (!t.bindEvents || (o && !t.showOverlay)) {
            return
        }
        var p = "mousedown mouseup keydown keypress";
        o ? g(document).bind(p, t, m) : g(document).unbind(p, m)
    }
    function m(r) {
        if (r.keyCode && r.keyCode == 9) {
            if (b && r.data.constrainTabKey) {
                var q = f;
                var p = !r.shiftKey && r.target == q[q.length - 1];
                var o = r.shiftKey && r.target == q[0];
                if (p || o) {
                    setTimeout(function () {
                        n(o)
                    }, 10);
                    return false
                }
            }
        }
        if (g(r.target).parents("div.blockMsg").length > 0) {
            return true
        }
        return g(r.target).parents().children().filter("div.blockUI").length == 0
    }
    function n(o) {
        if (!f) {
            return
        }
        var p = f[o === true ? f.length - 1 : 0];
        if (p) {
            p.focus()
        }
    }
    function a(v, o, z) {
        var w = v.parentNode,
            u = v.style;
        var q = ((w.offsetWidth - v.offsetWidth) / 2) - l(w, "borderLeftWidth");
        var r = ((w.offsetHeight - v.offsetHeight) / 2) - l(w, "borderTopWidth");
        if (o) {
            u.left = q > 0 ? (q + "px") : "0"
        }
        if (z) {
            u.top = r > 0 ? (r + "px") : "0"
        }
    }
    function l(o, q) {
        return parseInt(g.css(o, q)) || 0
    }
})(jQuery); /* jquery.blockUI.js */

/* jquery.onlyint.js */
(function (a) {
    a.fn.onlyint = function () {
        this.keydown(function (b) {
            if ((b.keyCode >= 96 && b.keyCode <= 105) || (b.keyCode >= 48 && b.keyCode <= 57) || (b.keyCode >= 8 && b.keyCode <= 46) || (b.keyCode >= 112 && b.keyCode <= 123) || (b.ctrlKey && b.keyCode == 86)) {
                return true
            }
            return false
        }).keyup(function (b) {
            a(this).val(a(this).val().replace(/\s|\D/g, ""))
        })
    }
})(jQuery); /* fim jquery.onlyint.js */

/* jquery.nextfield.js */
(function (a) {
    a.fn.nextfield = function (b) {
        var c = {
            maxLength: false,
            next: false,
            onblur: false,
            complete: false
        };
        var b = a.extend(c, b);
        this.unbind("keyup").keyup(function (d) {
            if (d.keyCode != 9 && d.keyCode != 16) {
                if (typeof b.maxLength == "number") {
                    if (a(this).val().replace(/_/g, "").length >= b.maxLength) {
                        if (typeof b.next == "object") {
                            if (typeof b.onblur == "function") {
                                b.onblur()
                            }
                            if (typeof b.complete == "function") {
                            	b.complete(a(this))
                            }
                            b.next.select()
                        } else {
                            alert("Por favor defina o atributo 'next' para o INPUT " + a(this).attr("name") + ".")
                        }
                    }
                } else {
                    alert("Por favor defina o atributo 'maxLength' para o INPUT " + a(this).attr("name") + ".")
                }
            }
        })
    }
})(jQuery); /* fim jquery.nextfield.js */

/* jquery.easing.1.3.js */
jQuery.easing.jswing = jQuery.easing.swing;
jQuery.extend(jQuery.easing, {
    def: "easeOutQuad",
    swing: function (e, f, a, h, g) {
        return jQuery.easing[jQuery.easing.def](e, f, a, h, g)
    },
    easeInQuad: function (e, f, a, h, g) {
        return h * (f /= g) * f + a
    },
    easeOutQuad: function (e, f, a, h, g) {
        return -h * (f /= g) * (f - 2) + a
    },
    easeInOutQuad: function (e, f, a, h, g) {
        if ((f /= g / 2) < 1) {
            return h / 2 * f * f + a
        }
        return -h / 2 * ((--f) * (f - 2) - 1) + a
    },
    easeInCubic: function (e, f, a, h, g) {
        return h * (f /= g) * f * f + a
    },
    easeOutCubic: function (e, f, a, h, g) {
        return h * ((f = f / g - 1) * f * f + 1) + a
    },
    easeInOutCubic: function (e, f, a, h, g) {
        if ((f /= g / 2) < 1) {
            return h / 2 * f * f * f + a
        }
        return h / 2 * ((f -= 2) * f * f + 2) + a
    },
    easeInQuart: function (e, f, a, h, g) {
        return h * (f /= g) * f * f * f + a
    },
    easeOutQuart: function (e, f, a, h, g) {
        return -h * ((f = f / g - 1) * f * f * f - 1) + a
    },
    easeInOutQuart: function (e, f, a, h, g) {
        if ((f /= g / 2) < 1) {
            return h / 2 * f * f * f * f + a
        }
        return -h / 2 * ((f -= 2) * f * f * f - 2) + a
    },
    easeInQuint: function (e, f, a, h, g) {
        return h * (f /= g) * f * f * f * f + a
    },
    easeOutQuint: function (e, f, a, h, g) {
        return h * ((f = f / g - 1) * f * f * f * f + 1) + a
    },
    easeInOutQuint: function (e, f, a, h, g) {
        if ((f /= g / 2) < 1) {
            return h / 2 * f * f * f * f * f + a
        }
        return h / 2 * ((f -= 2) * f * f * f * f + 2) + a
    },
    easeInSine: function (e, f, a, h, g) {
        return -h * Math.cos(f / g * (Math.PI / 2)) + h + a
    },
    easeOutSine: function (e, f, a, h, g) {
        return h * Math.sin(f / g * (Math.PI / 2)) + a
    },
    easeInOutSine: function (e, f, a, h, g) {
        return -h / 2 * (Math.cos(Math.PI * f / g) - 1) + a
    },
    easeInExpo: function (e, f, a, h, g) {
        return (f == 0) ? a : h * Math.pow(2, 10 * (f / g - 1)) + a
    },
    easeOutExpo: function (e, f, a, h, g) {
        return (f == g) ? a + h : h * (-Math.pow(2, -10 * f / g) + 1) + a
    },
    easeInOutExpo: function (e, f, a, h, g) {
        if (f == 0) {
            return a
        }
        if (f == g) {
            return a + h
        }
        if ((f /= g / 2) < 1) {
            return h / 2 * Math.pow(2, 10 * (f - 1)) + a
        }
        return h / 2 * (-Math.pow(2, -10 * --f) + 2) + a
    },
    easeInCirc: function (e, f, a, h, g) {
        return -h * (Math.sqrt(1 - (f /= g) * f) - 1) + a
    },
    easeOutCirc: function (e, f, a, h, g) {
        return h * Math.sqrt(1 - (f = f / g - 1) * f) + a
    },
    easeInOutCirc: function (e, f, a, h, g) {
        if ((f /= g / 2) < 1) {
            return -h / 2 * (Math.sqrt(1 - f * f) - 1) + a
        }
        return h / 2 * (Math.sqrt(1 - (f -= 2) * f) + 1) + a
    },
    easeInElastic: function (f, h, e, l, k) {
        var i = 1.70158;
        var j = 0;
        var g = l;
        if (h == 0) {
            return e
        }
        if ((h /= k) == 1) {
            return e + l
        }
        if (!j) {
            j = k * 0.3
        }
        if (g < Math.abs(l)) {
            g = l;
            var i = j / 4
        } else {
            var i = j / (2 * Math.PI) * Math.asin(l / g)
        }
        return -(g * Math.pow(2, 10 * (h -= 1)) * Math.sin((h * k - i) * (2 * Math.PI) / j)) + e
    },
    easeOutElastic: function (f, h, e, l, k) {
        var i = 1.70158;
        var j = 0;
        var g = l;
        if (h == 0) {
            return e
        }
        if ((h /= k) == 1) {
            return e + l
        }
        if (!j) {
            j = k * 0.3
        }
        if (g < Math.abs(l)) {
            g = l;
            var i = j / 4
        } else {
            var i = j / (2 * Math.PI) * Math.asin(l / g)
        }
        return g * Math.pow(2, -10 * h) * Math.sin((h * k - i) * (2 * Math.PI) / j) + l + e
    },
    easeInOutElastic: function (f, h, e, l, k) {
        var i = 1.70158;
        var j = 0;
        var g = l;
        if (h == 0) {
            return e
        }
        if ((h /= k / 2) == 2) {
            return e + l
        }
        if (!j) {
            j = k * (0.3 * 1.5)
        }
        if (g < Math.abs(l)) {
            g = l;
            var i = j / 4
        } else {
            var i = j / (2 * Math.PI) * Math.asin(l / g)
        }
        if (h < 1) {
            return -0.5 * (g * Math.pow(2, 10 * (h -= 1)) * Math.sin((h * k - i) * (2 * Math.PI) / j)) + e
        }
        return g * Math.pow(2, -10 * (h -= 1)) * Math.sin((h * k - i) * (2 * Math.PI) / j) * 0.5 + l + e
    },
    easeInBack: function (e, f, a, i, h, g) {
        if (g == undefined) {
            g = 1.70158
        }
        return i * (f /= h) * f * ((g + 1) * f - g) + a
    },
    easeOutBack: function (e, f, a, i, h, g) {
        if (g == undefined) {
            g = 1.70158
        }
        return i * ((f = f / h - 1) * f * ((g + 1) * f + g) + 1) + a
    },
    easeInOutBack: function (e, f, a, i, h, g) {
        if (g == undefined) {
            g = 1.70158
        }
        if ((f /= h / 2) < 1) {
            return i / 2 * (f * f * (((g *= (1.525)) + 1) * f - g)) + a
        }
        return i / 2 * ((f -= 2) * f * (((g *= (1.525)) + 1) * f + g) + 2) + a
    },
    easeInBounce: function (e, f, a, h, g) {
        return h - jQuery.easing.easeOutBounce(e, g - f, 0, h, g) + a
    },
    easeOutBounce: function (e, f, a, h, g) {
        if ((f /= g) < (1 / 2.75)) {
            return h * (7.5625 * f * f) + a
        } else {
            if (f < (2 / 2.75)) {
                return h * (7.5625 * (f -= (1.5 / 2.75)) * f + 0.75) + a
            } else {
                if (f < (2.5 / 2.75)) {
                    return h * (7.5625 * (f -= (2.25 / 2.75)) * f + 0.9375) + a
                } else {
                    return h * (7.5625 * (f -= (2.625 / 2.75)) * f + 0.984375) + a
                }
            }
        }
    },
    easeInOutBounce: function (e, f, a, h, g) {
        if (f < g / 2) {
            return jQuery.easing.easeInBounce(e, f * 2, 0, h, g) * 0.5 + a
        }
        return jQuery.easing.easeOutBounce(e, f * 2 - g, 0, h, g) * 0.5 + h * 0.5 + a
    }
}); /* fim jquery.easing.1.3.js */

/* jquery.fancybox-1.2.1.js */
(function (f) {
    f.fn.fixPNG = function () {
        return this.each(function () {
            var j = f(this).css("backgroundImage");
            if (j.match(/^url\(["']?(.*\.png)["']?\)$/i)) {
                j = RegExp.$1;
                f(this).css({
                    backgroundImage: "none",
                    filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(enabled=true, sizingMethod=" + (f(this).css("backgroundRepeat") == "no-repeat" ? "crop" : "scale") + ", src='" + j + "')"
                }).each(function () {
                    var k = f(this).css("position");
                    if (k != "absolute" && k != "relative") {
                        f(this).css("position", "relative")
                    }
                })
            }
        })
    };
    var d, a, g = false,
        c = new Image,
        h, i = 1,
        e = /\.(jpg|gif|png|bmp|jpeg)(.*)?$/i;
    var b = (f.browser.msie && parseInt(f.browser.version.substr(0, 1)) < 8);
    f.fn.fancybox = function (k) {
        k = f.extend({}, f.fn.fancybox.defaults, k);
        var s = this;

        function n() {
            d = this;
            a = k;
            l();
            return false
        }
        function l() {
            if (g) {
                return
            }
            if (f.isFunction(a.callbackOnStart)) {
                a.callbackOnStart()
            }
            a.itemArray = [];
            a.itemCurrent = 0;
            if (k.itemArray.length > 0) {
                a.itemArray = k.itemArray
            } else {
                var u = {};
                if (!d.rel || d.rel == "") {
                    var u = {
                        href: d.href,
                        title: d.title
                    };
                    if (f(d).children("img:first").length) {
                        u.orig = f(d).children("img:first")
                    }
                    a.itemArray.push(u)
                } else {
                    var v = f(s).filter("a[rel=" + d.rel + "]");
                    var u = {};
                    for (var t = 0; t < v.length; t++) {
                        u = {
                            href: v[t].href,
                            title: v[t].title
                        };
                        if (f(v[t]).children("img:first").length) {
                            u.orig = f(v[t]).children("img:first")
                        }
                        a.itemArray.push(u)
                    }
                    while (a.itemArray[a.itemCurrent].href != d.href) {
                        a.itemCurrent++
                    }
                }
            }
            if (a.overlayShow) {
                if (b) {
                    f("embed, object, select").css("visibility", "hidden")
                }
                f("#fancy_overlay").css("opacity", a.overlayOpacity).show()
            }
            o()
        }
        function o() {
            f("#fancy_right, #fancy_left, #fancy_close, #fancy_title").hide();
            var t = a.itemArray[a.itemCurrent].href;
            f.fn.fancybox.showLoading();
            if (t.match(/#/)) {
                var u = window.location.href.split("#")[0];
                u = t.replace(u, "");
                u = u.substr(u.indexOf("#"));
                m('<div id="fancy_div">' + f(u).html() + "</div>", a.frameWidth, a.frameHeight)
            } else {
                if (t.match(e)) {
                    c = new Image;
                    c.src = t;
                    if (c.complete) {
                        r()
                    } else {
                        f(c).unbind().bind("load", function () {
                            f(".fancy_loading").hide();
                            r()
                        })
                    }
                } else {
                    if (t.match("iframe") || d.className.indexOf("iframe") >= 0) {
                        m('<iframe id="fancy_frame" onload="$.fn.fancybox.showIframe()" name="fancy_iframe' + Math.round(Math.random() * 1000) + '" frameborder="0" hspace="0" src="' + t + '"></iframe>', a.frameWidth, a.frameHeight)
                    } else {
                        f.get(t, function (v) {
                            m('<div id="fancy_ajax">' + v + "</div>", a.frameWidth, a.frameHeight);
                            f(".fancy_loading").hide()
                        })
                    }
                }
            }
        }
        function r() {
            if (a.imageScale) {
                var u = f.fn.fancybox.getViewport();
                var x = Math.min(Math.min(u[0] - 36, c.width) / c.width, Math.min(u[1] - 60, c.height) / c.height);
                var v = Math.round(x * c.width);
                var t = Math.round(x * c.height)
            } else {
                var v = c.width;
                var t = c.height
            }
            m('<img alt="" id="fancy_img" src="' + c.src + '" />', v, t)
        }
        function p() {
            if ((a.itemArray.length - 1) > a.itemCurrent) {
                var t = a.itemArray[a.itemCurrent + 1].href;
                if (t.match(e)) {
                    objNext = new Image();
                    objNext.src = t
                }
            }
            if (a.itemCurrent > 0) {
                var t = a.itemArray[a.itemCurrent - 1].href;
                if (t.match(e)) {
                    objNext = new Image();
                    objNext.src = t
                }
            }
        }
        function m(z, u, B) {
            g = true;
            var x = a.padding;
            if (b) {
                f("#fancy_content")[0].style.removeExpression("height");
                f("#fancy_content")[0].style.removeExpression("width")
            }
            if (x > 0) {
                x = 0;
                u += x * 2;
                B += x * 2;
                f("#fancy_content").css({
                    top: x + "px",
                    right: x + "px",
                    bottom: x + "px",
                    left: x + "px",
                    width: "auto",
                    height: "auto"
                });
                if (b) {
                    f("#fancy_content")[0].style.setExpression("height", "(this.parentNode.clientHeight - 20)");
                    f("#fancy_content")[0].style.setExpression("width", "(this.parentNode.clientWidth - 20)")
                }
            } else {
                f("#fancy_content").css({
                    top: 0,
                    right: 0,
                    bottom: 0,
                    left: 0,
                    width: "100%",
                    height: "100%"
                })
            }
            if (f("#fancy_outer").is(":visible") && u == f("#fancy_outer").width() && B == f("#fancy_outer").height()) {
                f("#fancy_content").fadeOut("fast", function () {
                    f("#fancy_content").empty().append(f(z)).fadeIn("normal", function () {
                        j()
                    })
                });
                return
            }
            var A = f.fn.fancybox.getViewport();
            var v = (u + 36) > A[0] ? A[2] : (A[2] + Math.round((A[0] - u - 36) / 2));
            var D = (B + 50) > A[1] ? A[3] : (A[3] + Math.round((A[1] - B - 50) / 2));
            var C = {
                left: v,
                top: D,
                width: u + "px",
                height: B + "px"
            };
            if (f("#fancy_outer").is(":visible")) {
                f("#fancy_content").fadeOut("normal", function () {
                    f("#fancy_content").empty();
                    f("#fancy_outer").animate(C, a.zoomSpeedChange, a.easingChange, function () {
                        f("#fancy_content").append(f(z)).fadeIn("normal", function () {
                            j()
                        })
                    })
                })
            } else {
                if (a.zoomSpeedIn > 0 && a.itemArray[a.itemCurrent].orig !== undefined) {
                    f("#fancy_content").empty().append(f(z));
                    var y = a.itemArray[a.itemCurrent].orig;
                    var t = f.fn.fancybox.getPosition(y);
                    f("#fancy_outer").css({
                        left: (t.left - 18) + "px",
                        top: (t.top - 18) + "px",
                        width: f(y).width(),
                        height: f(y).height()
                    });
                    if (a.zoomOpacity) {
                        C.opacity = "show"
                    }
                    f("#fancy_outer").animate(C, a.zoomSpeedIn, a.easingIn, function () {
                        j()
                    })
                } else {
                    f("#fancy_content").hide().empty().append(f(z)).show();
                    f("#fancy_outer").css(C).fadeIn("normal", function () {
                        j()
                    })
                }
            }
        }
        function q() {
            if (a.itemCurrent != 0) {
                f("#fancy_left, #fancy_left_ico").unbind().bind("click", function (t) {
                    t.stopPropagation();
                    a.itemCurrent--;
                    o();
                    return false
                });
                f("#fancy_left").show()
            }
            if (a.itemCurrent != (a.itemArray.length - 1)) {
                f("#fancy_right, #fancy_right_ico").unbind().bind("click", function (t) {
                    t.stopPropagation();
                    a.itemCurrent++;
                    o();
                    return false
                });
                f("#fancy_right").show()
            }
        }
        function j() {
            q();
            p();
            f(document).keydown(function (t) {
                if (t.keyCode == 27) {
                    f.fn.fancybox.close();
                    f(document).unbind("keydown")
                } else {
                    if (t.keyCode == 37 && a.itemCurrent != 0) {
                        a.itemCurrent--;
                        o();
                        f(document).unbind("keydown")
                    } else {
                        if (t.keyCode == 39 && a.itemCurrent != (a.itemArray.length - 1)) {
                            a.itemCurrent++;
                            o();
                            f(document).unbind("keydown")
                        }
                    }
                }
            });
            if (a.centerOnScroll) {
                f(window).bind("resize scroll", f.fn.fancybox.scrollBox)
            } else {
                f("div#fancy_outer").css("position", "absolute")
            }
            if (a.hideOnContentClick) {
                f("#fancy_wrap").click(f.fn.fancybox.close)
            }
            f("#fancy_overlay, #fancy_close").bind("click", f.fn.fancybox.close);
            f("#fancy_close").show();
            if (a.itemArray[a.itemCurrent].title !== undefined && a.itemArray[a.itemCurrent].title.length > 0) {
                f("#fancy_title div:first").html(a.itemArray[a.itemCurrent].title);
                f("#fancy_title").show()
            }
            if (a.overlayShow && b) {
                f("embed, object, select", f("#fancy_content")).css("visibility", "visible")
            }
            if (f.isFunction(a.callbackOnShow)) {
                a.callbackOnShow()
            }
            g = false
        }
        return this.unbind("click").click(n)
    };
    f.fn.fancybox.scrollBox = function () {
        var j = f.fn.fancybox.getViewport();
        f("#fancy_outer").css("left", ((f("#fancy_outer").width() + 36) > j[0] ? j[2] : j[2] + Math.round((j[0] - f("#fancy_outer").width() - 36) / 2)));
        f("#fancy_outer").css("top", ((f("#fancy_outer").height() + 50) > j[1] ? j[3] : j[3] + Math.round((j[1] - f("#fancy_outer").height() - 50) / 2)))
    };
    f.fn.fancybox.getNumeric = function (j, k) {
        return parseInt(f.curCSS(j.jquery ? j[0] : j, k, true)) || 0
    };
    f.fn.fancybox.getPosition = function (j) {
        var k = j.offset();
        k.top += f.fn.fancybox.getNumeric(j, "paddingTop");
        k.top += f.fn.fancybox.getNumeric(j, "borderTopWidth");
        k.left += f.fn.fancybox.getNumeric(j, "paddingLeft");
        k.left += f.fn.fancybox.getNumeric(j, "borderLeftWidth");
        return k
    };
    f.fn.fancybox.showIframe = function () {
        f(".fancy_loading").hide();
        f("#fancy_frame").show()
    };
    f.fn.fancybox.getViewport = function () {
        return [f(window).width(), f(window).height(), f(document).scrollLeft(), f(document).scrollTop()]
    };
    f.fn.fancybox.animateLoading = function () {
        if (!f("#fancy_loading").is(":visible")) {
            clearInterval(h);
            return
        }
        f("#fancy_loading > div").css("top", (i * -40) + "px");
        i = (i + 1) % 12
    };
    f.fn.fancybox.showLoading = function () {
        clearInterval(h);
        var j = f.fn.fancybox.getViewport();
        f("#fancy_loading").css({
            left: ((j[0] - 40) / 2 + j[2]),
            top: ((j[1] - 40) / 2 + j[3])
        }).show();
        f("#fancy_loading").bind("click", f.fn.fancybox.close);
        h = setInterval(f.fn.fancybox.animateLoading, 66)
    };
    f.fn.fancybox.close = function () {
        g = true;
        f(c).unbind();
        f("#fancy_overlay, #fancy_close").unbind();
        if (a.hideOnContentClick) {
            f("#fancy_wrap").unbind()
        }
        f("#fancy_close, .fancy_loading, #fancy_left, #fancy_right, #fancy_title").hide();
        if (a.centerOnScroll) {
            f(window).unbind("resize scroll")
        }
        __cleanup = function () {
            f("#fancy_overlay, #fancy_outer").hide();
            if (a.centerOnScroll) {
                f(window).unbind("resize scroll")
            }
            if (b) {
                f("embed, object, select").css("visibility", "visible")
            }
            if (f.isFunction(a.callbackOnClose)) {
                a.callbackOnClose()
            }
            g = false
        };
        if (f("#fancy_outer").is(":visible") !== false) {
            if (a.zoomSpeedOut > 0 && a.itemArray[a.itemCurrent].orig !== undefined) {
                var k = a.itemArray[a.itemCurrent].orig;
                var j = f.fn.fancybox.getPosition(k);
                var l = {
                    left: (j.left - 18) + "px",
                    top: (j.top - 18) + "px",
                    width: f(k).width(),
                    height: f(k).height()
                };
                if (a.zoomOpacity) {
                    l.opacity = "hide"
                }
                f("#fancy_outer").stop(false, true).animate(l, a.zoomSpeedOut, a.easingOut, __cleanup)
            } else {
                f("#fancy_outer").stop(false, true).fadeOut("fast", __cleanup)
            }
        } else {
            __cleanup()
        }
        return false
    };
    f.fn.fancybox.build = function () {
        var j = "";
        j += '<div id="fancy_overlay"></div>';
        j += '<div id="fancy_wrap">';
        j += '<div class="fancy_loading" id="fancy_loading"><div></div></div>';
        j += '<div id="fancy_outer">';
        j += '<div id="fancy_inner">';
        j += '<div id="fancy_close"></div>';
        j += '<div id="fancy_title"></div>';
        j += '<div id="fancy_bg"><div class="fancy_bg fancy_bg_n"></div><div class="fancy_bg fancy_bg_ne"></div><div class="fancy_bg fancy_bg_e"></div><div class="fancy_bg fancy_bg_se"></div><div class="fancy_bg fancy_bg_s"></div><div class="fancy_bg fancy_bg_sw"></div><div class="fancy_bg fancy_bg_w"></div><div class="fancy_bg fancy_bg_nw"></div></div>';
        j += '<a href="javascript:;" id="fancy_left"><span class="fancy_ico" id="fancy_left_ico"></span></a><a href="javascript:;" id="fancy_right"><span class="fancy_ico" id="fancy_right_ico"></span></a>';
        j += '<div id="fancy_content"></div>';
        j += "</div>";
        j += "</div>";
        j += "</div>";
        f(j).appendTo("body");
        f('<table cellspacing="0" cellpadding="0" border="0"><tr><td class="fancy_title" id="fancy_title_left"></td><td class="fancy_title" id="fancy_title_main"><div id="TitleFancy"></div></td><td class="fancy_title" id="fancy_title_right"></td></tr></table>').appendTo("#fancy_title");
        if (b) {
            f("#fancy_close, .fancy_bg, .fancy_title, .fancy_ico").fixPNG()
        }
    };
    f.fn.fancybox.defaults = {
        padding: 10,
        imageScale: true,
        zoomOpacity: true,
        zoomSpeedIn: 600,
        zoomSpeedOut: 500,
        zoomSpeedChange: 300,
        easingIn: "easeOutBack",
        easingOut: "easeInBack",
        easingChange: "swing",
        frameWidth: 425,
        frameHeight: 355,
        overlayShow: true,
        overlayOpacity: 0.6,
        hideOnContentClick: false,
        centerOnScroll: true,
        itemArray: [],
        callbackOnStart: null,
        callbackOnShow: null,
        callbackOnClose: null
    };
    f(document).ready(function () {
        f.fn.fancybox.build()
    })
})(jQuery); /* fim jquery.fancybox-1.2.1.js */

/* jcarousellite_1.0.1.pack.js */
eval(function (p, a, c, k, e, r) {
    e = function (c) {
        return (c < a ? '' : e(parseInt(c / a))) + ((c = c % a) > 35 ? String.fromCharCode(c + 29) : c.toString(36))
    };
    if (!''.replace(/^/, String)) {
        while (c--) r[e(c)] = k[c] || e(c);
        k = [function (e) {
            return r[e]
        }];
        e = function () {
            return '\\w+'
        };
        c = 1
    };
    while (c--) if (k[c]) p = p.replace(new RegExp('\\b' + e(c) + '\\b', 'g'), k[c]);
    return p
}('(6($){$.1g.1w=6(o){o=$.1f({r:n,x:n,N:n,17:q,J:n,L:1a,16:n,y:q,u:12,H:3,B:0,k:1,K:n,I:n},o||{});8 G.R(6(){p b=q,A=o.y?"15":"w",P=o.y?"t":"s";p c=$(G),9=$("9",c),E=$("10",9),W=E.Y(),v=o.H;7(o.u){9.1h(E.D(W-v-1+1).V()).1d(E.D(0,v).V());o.B+=v}p f=$("10",9),l=f.Y(),4=o.B;c.5("1c","H");f.5({U:"T",1b:o.y?"S":"w"});9.5({19:"0",18:"0",Q:"13","1v-1s-1r":"S","z-14":"1"});c.5({U:"T",Q:"13","z-14":"2",w:"1q"});p g=o.y?t(f):s(f);p h=g*l;p j=g*v;f.5({s:f.s(),t:f.t()});9.5(P,h+"C").5(A,-(4*g));c.5(P,j+"C");7(o.r)$(o.r).O(6(){8 m(4-o.k)});7(o.x)$(o.x).O(6(){8 m(4+o.k)});7(o.N)$.R(o.N,6(i,a){$(a).O(6(){8 m(o.u?o.H+i:i)})});7(o.17&&c.11)c.11(6(e,d){8 d>0?m(4-o.k):m(4+o.k)});7(o.J)1p(6(){m(4+o.k)},o.J+o.L);6 M(){8 f.D(4).D(0,v)};6 m(a){7(!b){7(o.K)o.K.Z(G,M());7(o.u){7(a<=o.B-v-1){9.5(A,-((l-(v*2))*g)+"C");4=a==o.B-v-1?l-(v*2)-1:l-(v*2)-o.k}F 7(a>=l-v+1){9.5(A,-((v)*g)+"C");4=a==l-v+1?v+1:v+o.k}F 4=a}F{7(a<0||a>l-v)8;F 4=a}b=12;9.1o(A=="w"?{w:-(4*g)}:{15:-(4*g)},o.L,o.16,6(){7(o.I)o.I.Z(G,M());b=q});7(!o.u){$(o.r+","+o.x).1n("X");$((4-o.k<0&&o.r)||(4+o.k>l-v&&o.x)||[]).1m("X")}}8 q}})};6 5(a,b){8 1l($.5(a[0],b))||0};6 s(a){8 a[0].1k+5(a,\'1j\')+5(a,\'1i\')};6 t(a){8 a[0].1t+5(a,\'1u\')+5(a,\'1e\')}})(1x);', 62, 96, '||||curr|css|function|if|return|ul|||||||||||scroll|itemLength|go|null||var|false|btnPrev|width|height|circular||left|btnNext|vertical||animCss|start|px|slice|tLi|else|this|visible|afterEnd|auto|beforeStart|speed|vis|btnGo|click|sizeCss|position|each|none|hidden|overflow|clone|tl|disabled|size|call|li|mousewheel|true|relative|index|top|easing|mouseWheel|padding|margin|200|float|visibility|append|marginBottom|extend|fn|prepend|marginRight|marginLeft|offsetWidth|parseInt|addClass|removeClass|animate|setInterval|0px|type|style|offsetHeight|marginTop|list|jCarouselLite|jQuery'.split('|'), 0, {})) /* fim jcarousellite_1.0.1.pack.js */

/* jquery.numberFormat.js */

function number_format(f, c, l, e) {
    var b = f,
        a = c;
    var h = function (r, q) {
        var i = Math.pow(10, q);
        return (Math.round(r * i) / i).toString()
    };
    b = !isFinite(+b) ? 0 : +b;
    a = !isFinite(+a) ? 0 : Math.abs(a);
    var p = (typeof e === "undefined") ? "," : e;
    var d = (typeof l === "undefined") ? "." : l;
    var o = (a > 0) ? h(b, a) : h(Math.round(b), a);
    var m = h(Math.abs(b), a);
    var k, g;
    if (m >= 1000) {
        k = m.split(/\D/);
        g = k[0].length % 3 || 3;
        k[0] = o.slice(0, g + (b < 0)) + k[0].slice(g).replace(/(\d{3})/g, p + "$1");
        o = k.join(d)
    } else {
        o = o.replace(".", d)
    }
    var j = o.indexOf(d);
    if (a >= 1 && j !== -1 && (o.length - j - 1) < a) {
        o += new Array(a - (o.length - j - 1)).join(0) + "0"
    } else {
        if (a >= 1 && j === -1) {
            o += d + new Array(a).join(0) + "0"
        }
    }
    return o
}; /* fim jquery.numberFormat.js */

/* outros */
Function.prototype.method = function (a, b) {
    this.prototype[a] = b;
    return this
};
String.method("trim", function () {
    return this.replace(/^\s+|\s+$/g, "")
});
String.method("underline", function () {
    return this.replace(/_/g, "")
});
String.method("email", function () {
    var a = /^[\w!#$%&'*+\/=?^`{|}~-]+(\.[\w!#$%&'*+\/=?^`{|}~-]+)*@(([\w-]+\.)+[A-Za-z]{2,6}|\[\d{1,3}(\.\d{1,3}){3}\])$/;
    return a.test(this)
});

function ajustarMenuLateral() {
    var a = $("div.middle");
    var b = $("div.left .categoriasLeft .menu");
    if (a && b) {
        if (a.height() >= b.height()) {
            b.height(a.height())
        } else {
            a.height(b.height())
        }
    }
}
function ajustaWidthSite() {
    if (parseInt($(window).width()) < 999) {
        $(".limit").css("width", "999px")
    } else {
        $(".limit").css("width", $(window).width() + "px")
    }
}
function FancyboxResumo(){
	$(".resumoProduto a").fancybox({
		frameWidth: 700,
		frameHeight: 500,
		callbackOnShow: function () {}
	});
}
function FancyboxAviseme(){
	$(".avise_me a").fancybox({
        frameWidth: 495,
        frameHeight: 280,
        callbackOnShow: function () {}
    });
}


var TrocaSelo = "";
function TrocaImagens(){

	var $Selos = $("[seloprontaentrega]");
	if($Selos.length > 0){
		$Selos.each(function(i){
			var Selo = $(this).attr("seloprontaentrega").split(",");
			var $Img = $(this).children("img");
			if(Selo.length > 1){
				var SeloAtual = $Img.attr("src");
				switch(SeloAtual){
					case Selo[0]:
						$Img.attr("src" , Selo[1]);
						$Img.attr("alt" , "Pronta Entrega");
					break;
					case Selo[1]:
						$Img.attr("src" , Selo[0]);
						$Img.attr("alt" , "Frete");
					break; 
					default:
						$Img.attr("src" , Selo[0]);
						$Img.attr("alt" , "Frete");
					break;
				}
			}
		});
		
	}else{
		clearInterval(TrocaSelo);
	}
}

$(document).ready(function () {

	TrocaSelo = setInterval('TrocaImagens()', 1000);

	$(".atributo_especifico_detalhes").fancybox({ 
		'frameWidth'	: 500, 
		'frameHeight'	: 200,
		'callbackOnShow': function() 
		{
			$("#BtnConfirmacaoContinuar").Carrinho({
				'UrlBase'			: 'http://' + 'www.ricardoeletro.com.br',
				'Origem'			: 1
			});	
			$('#BtnConfirmacaoVoltar').click(function(){
				$.fn.fancybox.close();
			});
		}
	});	

    $(".headerCarrinho").mouseenter(function () {
        $(".detalhesCarrinho").slideDown("slow")
    });
    $(".headerCarrinho").mouseleave(function () {
        $(".detalhesCarrinho").slideUp("slow")
    });

    $(".headerBuscaOk").click(function () {
        $("#BuscaHeader").submit();
    });

    $("#BuscaHeader").submit(function () {
        var e = $("#q1").val().replace(/^\s+|\s+$/g, "");
        if (e.length >= 2) {
			if($("#BuscaHeader #loja1").attr("buscaespecifica") == "true" && $("#BuscaHeader #loja1:select").val() != ''){
				var Campo				= $("#BuscaHeader #loja1").val();
				var Busca				= $("#BuscaHeader #q1").val();

				var Url_BuscaEspecifica	= $("#Url_BuscaEspecifica").val()+Campo+"="+Busca;

				location.href = Url_BuscaEspecifica;
			}
			else{
	            return true;
			}
        }
        return false;
    });
    $(".footerBuscaOk").click(function () {
        $("#BuscaFooter").submit()
    });
    $("#BuscaFooter").submit(function () {
        var e = $("#q2").val().replace(/^\s+|\s+$/g, "");
        if (e.length >= 2) {
			if($("#BuscaFooter #loja2").attr("buscaespecifica") == "true" && $("#BuscaFooter #loja2:select").val() != ''){
				var Campo				= $("#BuscaFooter #loja2").val();
				var Busca				= $("#BuscaFooter #q2").val();

				var Url_BuscaEspecifica	= $("#Url_BuscaEspecifica").val()+Campo+"="+Busca;

				location.href = Url_BuscaEspecifica;
			}
			else{
	            return true;
			}
        }
        return false
    });


    $(".headerBuscaAvancada a, .footerBuscaAvancada a, .buscaAvancada a, .btn_busca_avancada a").fancybox({
        frameWidth: 800,
        frameHeight: 475,
        callbackOnShow: function () {}
    });
    
	FancyboxResumo();
	
    if ($.browser.msie && $.browser.version === "7.0") {
        var a = 299;
        var b = 500
    } else {
        var a = 299;
        var b = 500
    }
    $(".emailOFertas a, #emailOFertasMinhaConta a, a.emailOFertasLateral").fancybox({
        frameWidth: b,
        frameHeight: a,
        callbackOnShow: function () {}
    });
    $(".popUp a").fancybox({
        frameWidth: 550,
        frameHeight: 450,
        callbackOnShow: function () {}
    });
    $(".preco_formas_pagamento a").fancybox({
        frameWidth: 630,
        frameHeight: 350,
        callbackOnShow: function () {}
    });
    
	FancyboxAviseme();
	
    if ($.browser.msie && $.browser.version === "7.0") {
        var c = 420;
        var d = 550
    } else {
        var c = 380;
        var d = 550
    }
    $("#fale_conosco_link a, .campo_titulo_email a").fancybox({
        frameWidth: d,
        frameHeight: c,
        callbackOnShow: function () {}
    });
    $(".external").attr("target", "_blank");
	
	//URL com parametro sem refresh na pagina
	/*
		para usa a funcao, copie o codigo abaixo e substitua "Parametro" pelo nome do parametro a ser usado,
		caso o parametro nao exita na url, retorna vazio;
		
		setInterval(function carregarConteudo(){
			var Parametro = $.getUrlVar('Parametro');
		},100);
	*/
	$.extend({
		getUrlVars: function(){
			var vars = [], hash;
			var hashes = window.location.href.slice(window.location.href.indexOf('#') + 1).split('&');

			
				for(var i = 0; i < hashes.length; i++)
				{
					hash = hashes[i].split('=');
					vars.push(hash[0]);
					vars[hash[0]] = hash[1];
				}
				
				return vars;
		},
		getUrlVar: function(nome){
			if(typeof($.getUrlVars()[nome]) != "undefined"){
				return $.getUrlVars()[nome];
			}else{
				return '';
			}
		}
	});
	
}); /* fim outros */

/* jquery-hotkeys.js */
(function (b) {
    b.fn.__bind__ = b.fn.bind;
    b.fn.__unbind__ = b.fn.unbind;
    b.fn.__find__ = b.fn.find;
    var a = {
        version: "0.7.9",
        override: /keypress|keydown|keyup/g,
        triggersMap: {},
        specialKeys: {
            27: "esc",
            9: "tab",
            32: "space",
            13: "return",
            8: "backspace",
            145: "scroll",
            20: "capslock",
            144: "numlock",
            19: "pause",
            45: "insert",
            36: "home",
            46: "del",
            35: "end",
            33: "pageup",
            34: "pagedown",
            37: "left",
            38: "up",
            39: "right",
            40: "down",
            109: "-",
            112: "f1",
            113: "f2",
            114: "f3",
            115: "f4",
            116: "f5",
            117: "f6",
            118: "f7",
            119: "f8",
            120: "f9",
            121: "f10",
            122: "f11",
            123: "f12",
            191: "/"
        },
        shiftNums: {
            "`": "~",
            "1": "!",
            "2": "@",
            "3": "#",
            "4": "$",
            "5": "%",
            "6": "^",
            "7": "&",
            "8": "*",
            "9": "(",
            "0": ")",
            "-": "_",
            "=": "+",
            ";": ":",
            "'": '"',
            ",": "<",
            ".": ">",
            "/": "?",
            "\\": "|"
        },
        newTrigger: function (e, d, f) {
            var c = {};
            c[e] = {};
            c[e][d] = {
                cb: f,
                disableInInput: false
            };
            return c
        }
    };
    a.specialKeys = b.extend(a.specialKeys, {
        96: "0",
        97: "1",
        98: "2",
        99: "3",
        100: "4",
        101: "5",
        102: "6",
        103: "7",
        104: "8",
        105: "9",
        106: "*",
        107: "+",
        109: "-",
        110: ".",
        111: "/"
    });
    b.fn.find = function (c) {
        this.query = c;
        return b.fn.__find__.apply(this, arguments)
    };
    b.fn.unbind = function (h, e, g) {
        if (b.isFunction(e)) {
            g = e;
            e = null
        }
        if (e && typeof e === "string") {
            var f = ((this.prevObject && this.prevObject.query) || (this[0].id && this[0].id) || this[0]).toString();
            var d = h.split(" ");
            for (var c = 0; c < d.length; c++) {
                delete a.triggersMap[f][d[c]][e]
            }
        }
        return this.__unbind__(h, g)
    };
    b.fn.bind = function (j, f, k) {
        var h = j.match(a.override);
        if (b.isFunction(f) || !h) {
            return this.__bind__(j, f, k)
        } else {
            var n = null,
                i = b.trim(j.replace(a.override, ""));
            if (i) {
                n = this.__bind__(i, f, k)
            }
            if (typeof f === "string") {
                f = {
                    combi: f
                }
            }
            if (f.combi) {
                for (var m = 0; m < h.length; m++) {
                    var d = h[m];
                    var g = f.combi.toLowerCase(),
                        e = a.newTrigger(d, g, k),
                        l = ((this.prevObject && this.prevObject.query) || (this[0].id && this[0].id) || this[0]).toString();
                    e[d][g].disableInInput = f.disableInInput;
                    if (!a.triggersMap[l]) {
                        a.triggersMap[l] = e
                    } else {
                        if (!a.triggersMap[l][d]) {
                            a.triggersMap[l][d] = e[d]
                        }
                    }
                    var c = a.triggersMap[l][d][g];
                    if (!c) {
                        a.triggersMap[l][d][g] = [e[d][g]]
                    } else {
                        if (c.constructor !== Array) {
                            a.triggersMap[l][d][g] = [c]
                        } else {
                            a.triggersMap[l][d][g][c.length] = e[d][g]
                        }
                    }
                    this.each(function () {
                        var o = b(this);
                        if (o.attr("hkId") && o.attr("hkId") !== l) {
                            l = o.attr("hkId") + ";" + l
                        }
                        o.attr("hkId", l)
                    });
                    n = this.__bind__(h.join(" "), f, a.handler)
                }
            }
            return n
        }
    };
    a.findElement = function (c) {
        if (!b(c).attr("hkId")) {
            if (b.browser.opera || b.browser.safari) {
                while (!b(c).attr("hkId") && c.parentNode) {
                    c = c.parentNode
                }
            }
        }
        return c
    };
    a.handler = function (e) {
        var o = a.findElement(e.currentTarget),
            i = b(o),
            d = i.attr("hkId");
        if (d) {
            d = d.split(";");
            var g = e.which,
                q = e.type,
                p = a.specialKeys[g],
                n = !p && String.fromCharCode(g).toLowerCase(),
                h = e.shiftKey,
                c = e.ctrlKey,
                m = e.altKey || e.originalEvent.altKey,
                f = null;
            for (var r = 0; r < d.length; r++) {
                if (a.triggersMap[d[r]][q]) {
                    f = a.triggersMap[d[r]][q];
                    break
                }
            }
            if (f) {
                var j;
                if (!h && !c && !m) {
                    j = f[p] || (n && f[n])
                } else {
                    var l = "";
                    if (m) {
                        l += "alt+"
                    }
                    if (c) {
                        l += "ctrl+"
                    }
                    if (h) {
                        l += "shift+"
                    }
                    j = f[l + p];
                    if (!j) {
                        if (n) {
                            j = f[l + n] || f[l + a.shiftNums[n]] || (l === "shift+" && f[a.shiftNums[n]])
                        }
                    }
                }
                if (j) {
                    var s = false;
                    for (var r = 0; r < j.length; r++) {
                        if (j[r].disableInInput) {
                            var k = b(e.target);
                            if (i.is("input") || i.is("textarea") || i.is("select") || k.is("input") || k.is("textarea") || k.is("select")) {
                                return true
                            }
                        }
                        s = s || j[r].cb.apply(this, [e])
                    }
                    return s
                }
            }
        }
    };
    window.hotkeys = a;
    return b
})(jQuery); /* fim jquery-hotkeys.js */

/* Jquery getUrlVars */
//URL com parametro sem refresh na pagina
/*
	para usa a funcao, copie o codigo abaixo e substitua "Parametro" pelo nome do parametro a ser usado,
	caso o parametro nao exita na url, retorna vazio;
	
	setInterval(function carregarConteudo(){
		var Parametro = $.getUrlVar('Parametro');
	},100);
*/
$.extend({
	getUrlVars: function(){
		var vars = [], hash;
		var hashes = window.location.href.slice(window.location.href.indexOf('#') + 1).split('&');
			for(var i = 0; i < hashes.length; i++)
			{
				hash = hashes[i].split('=');
				vars.push(hash[0]);
				vars[hash[0]] = hash[1];
			}
			
			return vars;
	},
	getUrlVar: function(nome){
		if(typeof($.getUrlVars()[nome]) != "undefined"){
			return $.getUrlVars()[nome];
		}else{
			return '';
		}
	}
});
/* Fim Jquery getUrlVars */

/* Inicio Adicionar Carrinho */
/* JQUERY PLUGIN - Botão Comprar adicionando ao carrinho
 * VERSION: 0.1
 * BY: THIAGO LUCIANO LIMA SOARES - BELO HORIZONTE - MG
 * 
 * Descrição: Este plugin serve para criar uma método de inserção em eum carrinho
*				de compras. Através de um botão comprar ou de outro meio que 
*				tenha que receber um evento click. Utiliza o código do Produto.
*				O plugin também contempla algumas regras de e-commerce, como:
*				- Tratamento de atributos
*				- Tratamento de CompreJunto
*				- Tratamento de Garantia Extendida
*				- Lista de Casamento
 * 
 */
(function ($){
	$.fn.Carrinho = function(option){
				/* Configura todas as messagens do plugin. */	
		var message = {
			/* Informativos */
			Add							: "Adicionando no carrinho!",
			Garantia					: "Verificando garantia...",
			
			/* Avisos */
			AvisoOrigem					: "Aviso: A origem da requisi&ccedil;&atilde;o precisa ser informada!",
			AvisoEstoque				: "Produto Indispon&iacute;vel!",
			
			/* Erros */
			ErroUrlrequest				: "Erro: Este plugin exige uma url para realizar o post!",
			ErroAdd						: "N&atilde;o foi poss&iacute;vel adicionar no carrinho!",
			ErroClassAcessorios			: "Erro: Classe dos Checkbox de Acess&oacute;rios n&atilde;o foi informada!",
			ErroClassAdicaoProduto		: "Erro: Classe do Select de Atributo de Adi&ccedil;&atilde;o n&atilde;o foi informada!",
			ErroEPrincipal				: "Erro: C&oacute;digo do produto principal n&atilde;o foi informado."
		};
		/* Configurações */
		var settings = {
			/* Configurações Internas */
			AtributoNome				: '',
			AtributoValor				: '',
			EAcessoriosObrigatorio		: 0,
			AdicaoProdutoIdObrigatorio	: 1,
			Metodo						: (option.Metodo)				? option.Metodo					: '',			
			/* Configurações FancyBox */
			FancyExecOculto				: '#FancyExecOculto', // Não Mexer! Se mexer não dá nada. Mas não é bom mexer. kkk !
			FancyExecOcultoLista		: '#FancyExecOcultoLista', // Não Mexer! Se mexer não dá nada. Mas não é bom mexer. kkk !
			FancyExecOcultoAviso		: '#FancyExecOcultoAviso', // Não Mexer! Se mexer não dá nada. Mas não é bom mexer. kkk !
			FancyPalco					: (option.FancyPalco)			? option.FancyPalco				: '#LinkFancyBoxAtributoPlugin',
			FancyPalcoLista				: (option.FancyPalcoLista)		? option.FancyPalcoLista		: '#LinkFancyBoxListaPlugin',
			FancyPalcoAviso				: (option.FancyPalcoAviso)		? option.FancyPalcoAviso		: '#LinkFancyBoxAvisoPlugin',
			FancyAltura					: (option.FancyAltura)			? option.FancyAltura			: 170,
			FancyLargura				: (option.FancyLargura)			? option.FancyLargura			: 430, 
			FancyAlturaLista			: (option.FancyAlturaLista)		? option.FancyAlturaLista		: 250,
			FancyLarguraLista			: (option.FancyLarguraLista)	? option.FancyLarguraLista		: 470, 
			FancyAlturaAviso			: (option.FancyAlturaAviso)		? option.FancyAlturaAviso		: 210,
			FancyLarguraAviso			: (option.FancyLarguraAviso)	? option.FancyLarguraAviso		: 470, 
			FancyBotaoConfimacao		: (option.FancyBotaoConfimacao)	? option.FancyBotaoConfimacao	: '#BtnConfirmacaoContinuar',
			FancyBotaoVolar				: (option.FancyBotaoVolar)		? option.FancyBotaoVolar		: '#BtnConfirmacaoVoltar',
			/* Configurações Gerais */
			TimeErro					: (option.TimeErro) 			? option.TimeErro 				: 2000,
			TimeAviso					: (option.TimeAviso) 			? option.TimeAviso 				: 1000,
			Timeinfo					: (option.TimeAviso) 			? option.TimeAviso 				: 1000,
			UrlBase						: (option.UrlBase)	 			? option.UrlBase	 			: '',
			UrlRequest					: (option.UrlRequest) 			? option.UrlRequest 			: option.UrlBase+'/Carrinho/Adicionar',
			UrlDestino					: (option.UrlDestino) 			? option.UrlDestino 			: option.UrlBase+'/Carrinho',
			UrlGarantia					: (option.UrlGarantia) 			? option.UrlGarantia 			: option.UrlBase+'/GarantiaEstendida',
			Origem						: (option.Origem) 				? option.Origem 				: '',
			EPrincipal					: (option.EPrincipal)			? option.EPrincipal				: '',
			EAcessorios					: (option.EAcessorios) 			? option.EAcessorios 			: '', 
			ECompreJunto				: (option.ECompreJunto) 		? option.ECompreJunto 			: '',
			ListaCasamentoId			: (option.ListaCasamentoId) 	? option.ListaCasamentoId 		: '',
			AdicaoProdutoId				: (option.AdicaoProdutoId) 		? option.AdicaoProdutoId 		: '.selectAtributoAdicao'
		};
		
		/* Função de Exibição de Mensagens */
		function ExibeMensagem(mensagem, tipo, url){
			/* verifica o tipo de aviso : 1 -  Avisos, 2 - Erros, 3 - Informativos, 4 - Redirecionamento, 5 - Reload */
			switch(tipo){
				case 1:
					$.blockUI({ message: mensagem });
					setTimeout(function(){$.unblockUI();}, settings.TimeAviso);
				break;
				case 2:
					$.blockUI({ message: mensagem });
					setTimeout(function(){$.unblockUI();}, settings.TimeErro);
				break;
				case 3:
					$.blockUI({ message: mensagem });
					setTimeout(function(){$.unblockUI();}, settings.TimeInfo);
				break;
				case 4:
					$.blockUI({ message: mensagem });
					setTimeout(function(){ location.href = url}, settings.TimeInfo);
				break;
				case 5:
					$.blockUI({ message: mensagem });
					setTimeout(function(){ $.fn.fancybox.close(); window.location.reload(); }, settings.TimeInfo);
				break;
			}
		}
		
		/* Função Para abertura de FancyBox */
		function FancyAtributo(data){
			if($(settings.FancyPalco)[0]){
				if(!data.selectatributo){
					settings.AtributoNome	= data.atributo.nome;
					settings.AtributoValor	= data.atributo.valor;
					var urlfancy = '<a href="'+settings.UrlBase+'/Produto/ConfirmacaoAtributo/'+settings.EPrincipal+'/'+settings.ECompreJunto+'/'+settings.AtributoNome+'/'+settings.AtributoValor+'" id="'+settings.FancyExecOculto.replace('#','')+'" title="Confirma&ccedil;&atilde;o de '+settings.AtributoNome+'"></a>';
					$(settings.FancyPalco).empty().html(urlfancy);
				}else{
					var urlfancy = '<a href="'+settings.UrlBase+'/Produto/ConfirmacaoAtributo/'+settings.EPrincipal+'/'+settings.ECompreJunto+'/'+settings.AtributoNome+'/'+settings.AtributoValor+'/2" id="'+settings.FancyExecOculto.replace('#','')+'" title="Aten&ccedil;&atilde;o!"></a>';
					$(settings.FancyPalco).empty().html(urlfancy);
				}
				$(settings.FancyExecOculto).fancybox({
					'frameWidth'	: settings.FancyLargura,
					'frameHeight'	: settings.FancyAltura,
					'callbackOnShow': function() {
						$(settings.FancyBotaoConfimacao).Carrinho({
							'UrlBase'			: settings.UrlBase,
							'UrlRequest'		: settings.UrlRequest,
							'UrlDestino'		: settings.UrlDestino,
							'EAcessorios'		: settings.EAcessorios,
							'AdicaoProdutoId'	: settings.AdicaoProdutoId,
							'Origem'			: 3
						});
						$(settings.FancyBotaoVolar).click(function(){
							$(settings.FancyPalco).empty();
							$.fn.fancybox.close();
						});	
					}
				}).trigger('click');
			}else{
				$('body').prepend('<div id="'+settings.FancyPalco.replace('#','')+'" style="display: none"></div>');
				FancyAtributo(data);
			}
		}
		
		/* Função Para abertura de FancyBox da Lista Casamento */
		function FancyListaCasamento(op){
			if($(settings.FancyPalcoLista)[0]){
				if(op){
					var urlfancylista = '<a href="'+settings.UrlBase+'/Carrinho/ConfirmacaoSubstituicaoProduto/'+settings.EPrincipal+'" id="'+settings.FancyExecOcultoLista.replace('#','')+'" title=""></a>';
					$(settings.FancyPalcoLista).empty().html(urlfancylista);
				}else{
					settings.FancyLarguraLista 	= 470;
					settings.FancyAlturaLista 	= 170;
					var urlfancylista = '<a href="'+settings.UrlBase+'/Carrinho/ProdutoNaoListaCasamento/" id="'+settings.FancyExecOcultoLista.replace('#','')+'" title=""></a>';
					$(settings.FancyPalcoLista).empty().html(urlfancylista);
				}
				$(settings.FancyExecOcultoLista).fancybox({
					'frameWidth'	: settings.FancyLarguraLista,
					'frameHeight'	: settings.FancyAlturaLista,
					'callbackOnShow': function() {
						$(settings.FancyBotaoConfimacao).Carrinho({
							'UrlBase'			: settings.UrlBase,
							'UrlRequest'		: settings.UrlRequest,
							'UrlDestino'		: settings.UrlDestino,
							'EAcessorios'		: settings.EAcessorios,
							'AdicaoProdutoId'	: settings.AdicaoProdutoId,
							'ListaCasamentoId'	: settings.ListaCasamentoId,
							'Origem'			: 3
						});
						$(settings.FancyBotaoVolar).click(function(){
							$(settings.FancyPalco).empty();
							$.fn.fancybox.close();
						});	
					}
				}).trigger('click');
			}else{
				$('body').prepend('<div id="'+settings.FancyPalcoLista.replace('#','')+'" style="display: none"></div>');
				if(op){
					FancyListaCasamento(true);
				}else{
					FancyListaCasamento(false);
				}
			}
		}
		
		function FancyAviso(op){
			if($(settings.FancyPalcoAviso)[0]){
				switch(op){
					case 1:
						var urlfancyaviso = '<a href="'+settings.UrlBase+'/Carrinho/AvisoGarantiaRepetida" id="'+settings.FancyExecOcultoAviso.replace('#','')+'" title="Aten&ccedil;&atilde;o"></a>';
						$(settings.FancyPalcoAviso).empty().html(urlfancyaviso);
						break;
					default:
						break;
				}
				$(settings.FancyExecOcultoAviso).fancybox({
					'frameWidth'	: settings.FancyLarguraAviso,
					'frameHeight'	: settings.FancyAlturaAviso,
					'callbackOnShow': function(){
						$(settings.FancyBotaoVolar).click(function(){
							$(settings.FancyPalco).empty();
							$.fn.fancybox.close();
						});	
					}
				}).trigger('click');
			}else{
				switch(op){
					case 1:
						$('body').prepend('<div id="'+settings.FancyPalcoAviso.replace('#','')+'" style="display: none"></div>');
						FancyAviso(1);
						break;
					default:
						break;
				}
			}
		}
		
		if(settings.Metodo == 'flash'){
			EnviarCarrinho();
		}else{
			$(this).unbind('click').click(function(){
				$.blockUI({ message: "Verificando Informa&ccedil;&otilde;es! Aguarde..."});
				settings.EPrincipal 		= ($(this).attr('codigoproduto'))		? $(this).attr('codigoproduto')		: '';
				settings.ECompreJunto		= ($(this).attr('codigocomprejunto')) 	? $(this).attr('codigocomprejunto') : '';
				settings.ListaCasamentoId	= ($(this).attr('listadecasmentoid')) 	? $(this).attr('listadecasmentoid') : '';
				
				/* Verifica se a url da requisição foi setada. */
				if(settings.UrlRequest){
					if(settings.EPrincipal){
						EnviarCarrinho();
					}else{
						ExibeMensagem(message.ErroEPrincipal, 2);
					}
				}else{
					ExibeMensagem(message.ErroUrlrequest, 2);
				}
			});
		}
		
		function EnviarCarrinho(){
			/* Verifica se a classe de Acessórios existe e se foi enviada com o PONTO na frente. */
			if(settings.EAcessorios && (settings.EAcessorios.substr(0,1) == '.')){
				/* Monta o Array de Acessórios para o produto */
				AcessoriosCodigo = new Array();			
				$(settings.EAcessorios+':checked').each(function(i){
					AcessoriosCodigo[i] = $(this).val();
				});
			}else{
				AcessoriosCodigo = '';
				if(settings.EAcessoriosObrigatorio){
					ExibeMensagem(message.ErroClassAcessorios, 2);
					return false;
				}
			}
		
			/* Verifica se a classe de Atributos existe e se foi enviada com o PONTO na frente. */
			if(settings.AdicaoProdutoId && (settings.AdicaoProdutoId.substr(0,1) == '.')){
				if($(settings.AdicaoProdutoId)[0]){
					InterAdicaoProdutoId = $(settings.AdicaoProdutoId+' option:selected').val();					
				}else{
					InterAdicaoProdutoId = '';
				}
			}else{
				InterAdicaoProdutoId = '';
				if(settings.AdicaoProdutoIdObrigatorio){
					ExibeMensagem(message.ErroClassAdicaoProduto, 2);
					return false;
				}
			}
			
			$.post(
				settings.UrlRequest,
				{
					EPrincipal			: settings.EPrincipal,
					'EAcessorio[]' 		: (AcessoriosCodigo != '') 		? AcessoriosCodigo  		: '',
					ECompreJunto 		: (settings.ECompreJunto)		? settings.ECompreJunto		: '',
					AdicaoProdutoId		: (InterAdicaoProdutoId != '')	? InterAdicaoProdutoId		: '',
					ListaCasamentoId	: settings.ListaCasamentoId,
					Origem				: settings.Origem
				},
				function(data){
					if(data.success){						
						if(!data.add){
							switch(settings.Origem){
								case 1:
									$.unblockUI();
									if(data.proibidoadd){
										FancyAviso(1);
									}
									else if(data.produtolistacasamento){
										FancyListaCasamento(true);
									}else if(data.produtonaolistacasamento){
										FancyListaCasamento(false);
									}else{
										if(!data.refresh){
											FancyAtributo(data);
										}else{
											ExibeMensagem(message.AvisoEstoque, 5);
										}
									}
								break;
								case 2:
									$.unblockUI();
									if(data.proibidoadd){
										FancyAviso(1);
									}
									else if(data.produtolistacasamento){
										FancyListaCasamento(true);
									}else if(data.produtonaolistacasamento){
										FancyListaCasamento(false);
									}else{
										if(!data.refresh){
											FancyAtributo(data);
										}else{
											ExibeMensagem(message.AvisoEstoque, 5);
										}
									}
								break;
								case 3:
									if(data.refresh){
										ExibeMensagem(message.AvisoEstoque, 5);										
									}
								break;
								default:
									ExibeMensagem(message.AvisoOrigem, 1);
								break;
							}
						}else{
							if(!data.garantia){
									ExibeMensagem(message.Add, 4, settings.UrlDestino);
							}else{
								ExibeMensagem(message.Garantia, 4, settings.UrlGarantia);	
							}
						}
					}else{
						ExibeMensagem(message.ErroAdd, 4, settings.UrlBase);	
					}
				},
				'json'
			);	
		}
	};
	
	$.fn.CarrinhoFlash = function(codigo){
		$.fn.Carrinho({
			'UrlBase'		: '',
			'EPrincipal'	: codigo,
			'Origem'		: 2,
			'Metodo'		: 'flash'
		});		
	}
})(jQuery);
/* Fim Adicionar Carrinho */


/* Inicio Skin 4Fun */
/* JQUERY PLUGIN - Intervenção 4Fun ( SKIN 4FUN )
 * VERSION: 0.1
 * BY: 	THIAGO LUCIANO LIMA SOARES 	- BELO HORIZONTE - MG
 *		EMERSON COELHO 				- BELO HORIZONTE - MG
 * 
 * Descrição: 
 * Este plugin gera um pop-up na página permitindo escolher o posicionamento do mesmo na janela. Permite diser se vai ou não acompanhar o scroll.
 * Outra Característica do plugin é poder dizer qual elemento da página vai ser a base de calculo. Exemplo a div limit do site, a janela (window) ou um full banner, etc.
 */
(function ($){
	var skinMethods = {
		'Init' 		: 	function(settings, div){
							
							var cssObj = {
								/* Atributos Fixos */
								'position'	: (settings.skinScroll) ? 'fixed' : settings.skinPosicao,
								'z-index'	: settings.skinZIndex,
								/* Atributos de tamanho */
								'width' 	: settings.skinWidth+'px',
								'height' 	: settings.skinHeight+'px'
							}
							
							if(settings.skinScroll){
								settings.skinPos = 'top';
							}
				
							cssObj.left = skinMethods.dimensaoDivWidth(settings.skinFloat,settings.skinWidth,settings.divLimit,settings.divOther,settings.skinRequest);
							cssObj.top	= skinMethods.dimensaoDivHeight(settings.skinPos,settings.skinHeight,settings.divLimit,settings.divOther,settings.skinRequest);
							settings.divBanner.fadeIn(settings.skinTimeIn).css(cssObj);
							if(settings.skinTimeOut > 0){
								setTimeout(function(){ skinMethods.Close(settings) }, settings.skinTimeOut);
							}
						},
		'Close'				: 	function(settings){							
									settings.divBanner.fadeOut(1000);
							},
		'Resize'			: 	function(settings, div){
										var cssObj2 = {
											'left'	:	0,
											'top'	: 	0
										}
										cssObj2.left	= skinMethods.dimensaoDivWidth(settings.skinFloat,settings.skinWidth,settings.divLimit,settings.divOther,settings.skinRequest);
										cssObj2.top		= skinMethods.dimensaoDivHeight(settings.skinPos,settings.skinHeight,settings.divLimit,settings.divOther,settings.skinRequest);
										$('.bannerDhtml').css(cssObj2);
								},
		'dimensaoDivWidth'	:	function(float, width, limit, other, ref){
									d = (ref == 'Pagina') ? limit : other;
									switch(float){
										case 'right' || 'Right':
											var dimensoes = limit.innerWidth() - width - 28;
											return dimensoes;
										break;
										case 'left' || 'Left':
											var dimensoes = 50;
											return dimensoes;
										break;
										default:
											var dimensoes = ((limit.innerWidth() / 2) - (width / 2));
											return dimensoes;
										break;
									}
								},
		'dimensaoDivHeight'	:	function(pos, height, limit, other, ref){
									d = (ref == 'Pagina') ? limit : other;
									switch(pos){
										case 'top' || 'Top':
											var dimensoes = 170;
											return dimensoes;
										break;
										case 'bottom' || 'Bottom':
											var dimensoes = limit.innerHeight() - height - 326;
											return dimensoes;
										break;
										default:
											var dimensoes = (limit.innerHeight()/2) - (height/2);
											return dimensoes;
										break;
									}
								}
		}

	$.fn.Skin4Fun = function(skinMethod){
		var settings = $.extend({
			/* Atributos Fixos */
			divBanner			: $('.bannerDhtml'),
			divLimit			: $('.limit'),
			divOther			: $('#SWF'),
			skinPosicao			: 'absolute',
			skinZIndex			: 999,
			/* Atributos de tamanho */
			skinWidth			: 500,
			skinHeight			: 500,
			/* Atributos de Posicionamento */
			skinPos 			: 'top',
			skinFloat			: 'none',
			/* Atributo de Deslocamento */
			skinScroll			: false, /* true->Trava o skin ao scroll, false->Não acompanha scroll */
			/* Atributo de Tempo de Exibição */
			skinTimeIn			: 500,
			skinTimeOut			: 10000, /* Tempo de saída do skin 0-> Não some! */
			/* Atributo de Referência */
			skinReferencia		: 'Pagina',
			/* Atributo de Ação, ou seja, qual ação o plugin deve executar (Inicialiazar, Redimencionar ou Fechar )*/
			skinRequest			: 'Init'
		}, skinMethod);
		$(window).resize(function(){
			skinMethods.Resize(settings, this);
		});
		switch(skinMethod['skinRequest']){
			case 'init':
				skinMethods.Init(settings, this);
			break;
			case 'close':
				skinMethods.Close(settings);
			break;
			case 'resize':
				skinMethods.Resize(settings, this);
			break;
			default:
				skinMethods.Init(settings, this);
			break;				 	
		}

	};
})(jQuery);

/*
 * Pluigin javascript para Banner Rotativo
 * @autor: Thiago Luciano
 * @return 
*/ 
(function ($){
	var BannerRandomMethods = {
		// metodo de inicializacao
		'Init' 		: 	function(settings){
			BannerRandomMethods.Range(settings);
		},
		/*
		 * metodo de definição do range
		 * @name Resquests
		 * @param settings
		 * return void
		 */ 
		'Range' : function(settings){
			var Id = 1;
			for(i=1; i <= settings.Qtd; i++){
				$("#"+settings.Range+i).unbind('click').click(function(){
					BannerRandomMethods.Run(settings, $(this));
				});
			}
			if(settings.Loop){
				settings.TimePause = 1;
				BannerRandomMethods.Loop(settings, $("#"+settings.Range+2), 2);
			}
			settings.Control.unbind('click').click(function(){
				BannerRandomMethods.Pause(settings);
			})
			if(settings.ControlColor){
				settings.Control.removeClass('startbranco').addClass('pausebranco');
			}else{
				settings.Control.removeClass('startcinza').addClass('pausecinza');
			}
			/*if(settings.Loop){
				$('.item').mouseenter(function(){
					if(settings.Loop){
						BannerRandomMethods.Pause(settings);
					}
				}).mouseleave(function(){
					if(!settings.Loop){
						BannerRandomMethods.Pause(settings);	
					}
				});
			}*/
		},
		/*
		 * metodo de definição do controle de loop
		 * @name Resquests
		 * @param settings, Id
		 * return void
		 */ 
		'Loop' : function(settings, $this, Id){		
			clearInterval(settings.TimeInstance);
			if(settings.Loop && settings.Prod.length > 1){
				settings.TimeInstance = setInterval(function(){ BannerRandomMethods.Run(settings, $this); }, (settings.TimeLoop*1000));
			}
		},
		/*
		 * metodo de definição do transições
		 * @name Resquests
		 * @param settings, Id
		 * return void
		 */
		'Transaction' : function(settings, Id){
			$('.ativo').fadeOut(100).removeClass('ativo');
			$('#'+settings.Prod+Id).fadeIn(500).addClass('ativo');
		},
		/*
		 * metodo de execução
		 * @name Resquests
		 * @param settings, Objeto
		 * return void
		 */
		'Run' : function(settings, $this){
			if($this.attr('class') != "numativo"){
				$(".range li").each(function(){
					$(this).removeClass('numativo');
				});
				$this.addClass('numativo');
				settings.TimePause = Id = $this.attr('id').replace(settings.Range,"");
				BannerRandomMethods.Transaction(settings, Id);
				if(settings.Loop){
					Id = BannerRandomMethods.Next(settings, Id);
					BannerRandomMethods.Loop(settings, $("#"+settings.Range+Id), Id);
				}
			}else if(settings.TimePause == $this.attr('id').replace(settings.Range,"")){
				$(".range li").each(function(){
					$(this).removeClass('numativo');
				});
				$('#'+settings.Range+BannerRandomMethods.Next(settings, settings.TimePause)).addClass('numativo');
				settings.TimePause = Id = $('#'+settings.Range+BannerRandomMethods.Next(settings, settings.TimePause)).attr('id').replace(settings.Range,"");
				BannerRandomMethods.Transaction(settings, Id);
				if(settings.Loop){
					Id = BannerRandomMethods.Next(settings, Id);
					BannerRandomMethods.Loop(settings, $("#"+settings.Range+Id), Id);
				}
			}
			
		},
		/*
		 * metodo para definição do próximo
		 * @name Resquests
		 * @param settings, Id
		 * return Id
		 */
		'Next' : function(settings, Id){
			Id = parseInt(Id);
			if(Id < settings.Qtd){
				Id = Id+1;
			}else if(Id >= settings.Qtd){
				Id = 1;
			}
			return Id;
		},
		/*
		 * metodo para start e stop
		 * @name Resquests
		 * @param settings
		 * return void
		 */
		'Pause' : function(settings){
			if(settings.Loop){
				settings.Loop = false;
				clearInterval(settings.TimeInstance);
				if(settings.ControlColor){
					settings.Control.removeClass('pausebranco').addClass('startbranco');
				}else{
					settings.Control.removeClass('pausecinza').addClass('startcinza');
				}
				settings.TimePause = BannerRandomMethods.Next(settings, settings.TimePause);					
			}else{
				settings.Loop = true;
				Id = BannerRandomMethods.Next(settings, settings.TimePause);
				if(settings.ControlColor){
					settings.Control.removeClass('startbranco').addClass('pausebranco');
				}else{
					settings.Control.removeClass('startcinza').addClass('pausecinza');
				}
				BannerRandomMethods.Run(settings, $("#"+settings.Range+settings.TimePause));
			}
		}
	}
	
	// metodo principal
	$.fn.BannerRandom = function(Param){
		var settings = $.extend({
			TimeLoop		: 3 			//Segundos
			,Loop			: true
			,TimeInstance	: 0				//Instancia do intervalo
			,TimePause		: 1				//Id do Objeto em Pausa
			,Qtd			: 1 			//Quantidades de Produtos
			,Range			: 'Range' 		//Definição dos Ids de Range
			,Prod			: 'Produto'		//Definição dos Ids de Produtos
			,Control		: $('#control') //Id do controle do banner
			,ControlColor	: true
		}, Param);
			
		BannerRandomMethods.Init(settings);
	};
})(jQuery);