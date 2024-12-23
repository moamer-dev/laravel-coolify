!(function (t, e) {
    "object" == typeof exports && "undefined" != typeof module
        ? e(exports)
        : "function" == typeof define && define.amd
        ? define(["exports"], e)
        : e(
              ((t =
                  "undefined" != typeof globalThis
                      ? globalThis
                      : t || self).Draggable = {})
          );
})(this, function (t) {
    "use strict";
    class e {
        constructor(t) {
            (this._canceled = !1), (this.data = t);
        }
        get type() {
            return this.constructor.type;
        }
        get cancelable() {
            return this.constructor.cancelable;
        }
        cancel() {
            this._canceled = !0;
        }
        canceled() {
            return this._canceled;
        }
        clone(t) {
            return new this.constructor({ ...this.data, ...t });
        }
    }
    (e.type = "event"), (e.cancelable = !1);
    class r {
        constructor(t) {
            this.draggable = t;
        }
        attach() {
            throw new Error("Not Implemented");
        }
        detach() {
            throw new Error("Not Implemented");
        }
    }
    const n = { mouse: 0, drag: 0, touch: 100 };
    class s {
        constructor(t = [], e = {}) {
            (this.containers = [...t]),
                (this.options = { ...e }),
                (this.dragging = !1),
                (this.currentContainer = null),
                (this.originalSource = null),
                (this.startEvent = null),
                (this.delay = (function (t) {
                    const e = {};
                    if (void 0 === t) return { ...n };
                    if ("number" == typeof t) {
                        for (const r in n)
                            Object.prototype.hasOwnProperty.call(n, r) &&
                                (e[r] = t);
                        return e;
                    }
                    for (const r in n)
                        Object.prototype.hasOwnProperty.call(n, r) &&
                            (void 0 === t[r] ? (e[r] = n[r]) : (e[r] = t[r]));
                    return e;
                })(e.delay));
        }
        attach() {
            return this;
        }
        detach() {
            return this;
        }
        addContainer(...t) {
            this.containers = [...this.containers, ...t];
        }
        removeContainer(...t) {
            this.containers = this.containers.filter((e) => !t.includes(e));
        }
        trigger(t, e) {
            const r = document.createEvent("Event");
            return (
                (r.detail = e),
                r.initEvent(e.type, !0, !0),
                t.dispatchEvent(r),
                (this.lastEvent = e),
                e
            );
        }
    }
    function i(t, e) {
        if (null == t) return null;
        function r(t) {
            return (
                null != t &&
                null != e &&
                ((function (t) {
                    return Boolean("string" == typeof t);
                })(e)
                    ? Element.prototype.matches.call(t, e)
                    : (function (t) {
                          return Boolean(
                              t instanceof NodeList || t instanceof Array
                          );
                      })(e)
                    ? [...e].includes(t)
                    : (function (t) {
                          return Boolean(t instanceof Node);
                      })(e)
                    ? e === t
                    : !!(function (t) {
                          return Boolean("function" == typeof t);
                      })(e) && e(t))
            );
        }
        let n = t;
        do {
            if (
                ((n = n.correspondingUseElement || n.correspondingElement || n),
                r(n))
            )
                return n;
            n = n?.parentNode || null;
        } while (null != n && n !== document.body && n !== document);
        return null;
    }
    function o(t, { name: e, addInitializer: r }) {
        r(function () {
            this[e] = t.bind(this);
        });
    }
    function a(t, e, r, n) {
        return Math.sqrt((r - t) ** 2 + (n - e) ** 2);
    }
    function l(t) {
        const { touches: e, changedTouches: r } = t;
        return (e && e[0]) || (r && r[0]);
    }
    class c extends e {
        get originalEvent() {
            return this.data.originalEvent;
        }
        get clientX() {
            return this.data.clientX;
        }
        get clientY() {
            return this.data.clientY;
        }
        get target() {
            return this.data.target;
        }
        get container() {
            return this.data.container;
        }
        get originalSource() {
            return this.data.originalSource;
        }
        get pressure() {
            return this.data.pressure;
        }
    }
    class h extends c {}
    h.type = "drag:start";
    class d extends c {}
    d.type = "drag:move";
    class u extends c {}
    u.type = "drag:stop";
    class g extends c {}
    g.type = "drag:pressure";
    const m = Symbol("onContextMenuWhileDragging"),
        p = Symbol("onMouseDown"),
        v = Symbol("onMouseMove"),
        f = Symbol("onMouseUp"),
        b = Symbol("startDrag"),
        y = Symbol("onDistanceChange");
    class E extends s {
        constructor(t = [], e = {}) {
            super(t, e),
                (this.mouseDownTimeout = null),
                (this.pageX = null),
                (this.pageY = null),
                (this[m] = this[m].bind(this)),
                (this[p] = this[p].bind(this)),
                (this[v] = this[v].bind(this)),
                (this[f] = this[f].bind(this)),
                (this[b] = this[b].bind(this)),
                (this[y] = this[y].bind(this));
        }
        attach() {
            document.addEventListener("mousedown", this[p], !0);
        }
        detach() {
            document.removeEventListener("mousedown", this[p], !0);
        }
        [p](t) {
            if (0 !== t.button || t.ctrlKey || t.metaKey) return;
            const e = i(t.target, this.containers);
            if (!e) return;
            if (
                this.options.handle &&
                t.target &&
                !i(t.target, this.options.handle)
            )
                return;
            const r = i(t.target, this.options.draggable);
            if (!r) return;
            const { delay: n } = this,
                { pageX: s, pageY: o } = t;
            Object.assign(this, { pageX: s, pageY: o }),
                (this.onMouseDownAt = Date.now()),
                (this.startEvent = t),
                (this.currentContainer = e),
                (this.originalSource = r),
                document.addEventListener("mouseup", this[f]),
                document.addEventListener("dragstart", C),
                document.addEventListener("mousemove", this[y]),
                (this.mouseDownTimeout = window.setTimeout(() => {
                    this[y]({ pageX: this.pageX, pageY: this.pageY });
                }, n.mouse));
        }
        [b]() {
            const t = this.startEvent,
                e = this.currentContainer,
                r = this.originalSource,
                n = new h({
                    clientX: t.clientX,
                    clientY: t.clientY,
                    target: t.target,
                    container: e,
                    originalSource: r,
                    originalEvent: t,
                });
            this.trigger(this.currentContainer, n),
                (this.dragging = !n.canceled()),
                this.dragging &&
                    (document.addEventListener("contextmenu", this[m], !0),
                    document.addEventListener("mousemove", this[v]));
        }
        [y](t) {
            const { pageX: e, pageY: r } = t,
                { distance: n } = this.options,
                { startEvent: s, delay: i } = this;
            if (
                (Object.assign(this, { pageX: e, pageY: r }),
                !this.currentContainer)
            )
                return;
            const o = Date.now() - this.onMouseDownAt,
                l = a(s.pageX, s.pageY, e, r) || 0;
            clearTimeout(this.mouseDownTimeout),
                o < i.mouse
                    ? document.removeEventListener("mousemove", this[y])
                    : l >= n &&
                      (document.removeEventListener("mousemove", this[y]),
                      this[b]());
        }
        [v](t) {
            if (!this.dragging) return;
            const e = document.elementFromPoint(t.clientX, t.clientY),
                r = new d({
                    clientX: t.clientX,
                    clientY: t.clientY,
                    target: e,
                    container: this.currentContainer,
                    originalEvent: t,
                });
            this.trigger(this.currentContainer, r);
        }
        [f](t) {
            if ((clearTimeout(this.mouseDownTimeout), 0 !== t.button)) return;
            if (
                (document.removeEventListener("mouseup", this[f]),
                document.removeEventListener("dragstart", C),
                document.removeEventListener("mousemove", this[y]),
                !this.dragging)
            )
                return;
            const e = document.elementFromPoint(t.clientX, t.clientY),
                r = new u({
                    clientX: t.clientX,
                    clientY: t.clientY,
                    target: e,
                    container: this.currentContainer,
                    originalEvent: t,
                });
            this.trigger(this.currentContainer, r),
                document.removeEventListener("contextmenu", this[m], !0),
                document.removeEventListener("mousemove", this[v]),
                (this.currentContainer = null),
                (this.dragging = !1),
                (this.startEvent = null);
        }
        [m](t) {
            t.preventDefault();
        }
    }
    function C(t) {
        t.preventDefault();
    }
    const S = Symbol("onTouchStart"),
        w = Symbol("onTouchEnd"),
        x = Symbol("onTouchMove"),
        D = Symbol("startDrag"),
        L = Symbol("onDistanceChange");
    let O = !1;
    window.addEventListener(
        "touchmove",
        (t) => {
            O && t.preventDefault();
        },
        { passive: !1 }
    );
    class F extends s {
        constructor(t = [], e = {}) {
            super(t, e),
                (this.currentScrollableParent = null),
                (this.tapTimeout = null),
                (this.touchMoved = !1),
                (this.pageX = null),
                (this.pageY = null),
                (this[S] = this[S].bind(this)),
                (this[w] = this[w].bind(this)),
                (this[x] = this[x].bind(this)),
                (this[D] = this[D].bind(this)),
                (this[L] = this[L].bind(this));
        }
        attach() {
            document.addEventListener("touchstart", this[S]);
        }
        detach() {
            document.removeEventListener("touchstart", this[S]);
        }
        [S](t) {
            const e = i(t.target, this.containers);
            if (!e) return;
            if (
                this.options.handle &&
                t.target &&
                !i(t.target, this.options.handle)
            )
                return;
            const r = i(t.target, this.options.draggable);
            if (!r) return;
            const { distance: n = 0 } = this.options,
                { delay: s } = this,
                { pageX: o, pageY: a } = l(t);
            Object.assign(this, { pageX: o, pageY: a }),
                (this.onTouchStartAt = Date.now()),
                (this.startEvent = t),
                (this.currentContainer = e),
                (this.originalSource = r),
                document.addEventListener("touchend", this[w]),
                document.addEventListener("touchcancel", this[w]),
                document.addEventListener("touchmove", this[L]),
                e.addEventListener("contextmenu", X),
                n && (O = !0),
                (this.tapTimeout = window.setTimeout(() => {
                    this[L]({
                        touches: [{ pageX: this.pageX, pageY: this.pageY }],
                    });
                }, s.touch));
        }
        [D]() {
            const t = this.startEvent,
                e = this.currentContainer,
                r = l(t),
                n = this.originalSource,
                s = new h({
                    clientX: r.pageX,
                    clientY: r.pageY,
                    target: t.target,
                    container: e,
                    originalSource: n,
                    originalEvent: t,
                });
            this.trigger(this.currentContainer, s),
                (this.dragging = !s.canceled()),
                this.dragging &&
                    document.addEventListener("touchmove", this[x]),
                (O = this.dragging);
        }
        [L](t) {
            const { distance: e } = this.options,
                { startEvent: r, delay: n } = this,
                s = l(r),
                i = l(t),
                o = Date.now() - this.onTouchStartAt,
                c = a(s.pageX, s.pageY, i.pageX, i.pageY);
            Object.assign(this, i),
                clearTimeout(this.tapTimeout),
                o < n.touch
                    ? document.removeEventListener("touchmove", this[L])
                    : c >= e &&
                      (document.removeEventListener("touchmove", this[L]),
                      this[D]());
        }
        [x](t) {
            if (!this.dragging) return;
            const { pageX: e, pageY: r } = l(t),
                n = document.elementFromPoint(
                    e - window.scrollX,
                    r - window.scrollY
                ),
                s = new d({
                    clientX: e,
                    clientY: r,
                    target: n,
                    container: this.currentContainer,
                    originalEvent: t,
                });
            this.trigger(this.currentContainer, s);
        }
        [w](t) {
            if (
                (clearTimeout(this.tapTimeout),
                (O = !1),
                document.removeEventListener("touchend", this[w]),
                document.removeEventListener("touchcancel", this[w]),
                document.removeEventListener("touchmove", this[L]),
                this.currentContainer &&
                    this.currentContainer.removeEventListener("contextmenu", X),
                !this.dragging)
            )
                return;
            document.removeEventListener("touchmove", this[x]);
            const { pageX: e, pageY: r } = l(t),
                n = document.elementFromPoint(
                    e - window.scrollX,
                    r - window.scrollY
                );
            t.preventDefault();
            const s = new u({
                clientX: e,
                clientY: r,
                target: n,
                container: this.currentContainer,
                originalEvent: t,
            });
            this.trigger(this.currentContainer, s),
                (this.currentContainer = null),
                (this.dragging = !1),
                (this.startEvent = null);
        }
    }
    function X(t) {
        t.preventDefault(), t.stopPropagation();
    }
    const Y = Symbol("onMouseDown"),
        T = Symbol("onMouseUp"),
        M = Symbol("onDragStart"),
        A = Symbol("onDragOver"),
        N = Symbol("onDragEnd"),
        z = Symbol("onDrop"),
        P = Symbol("reset");
    const I = Symbol("onMouseForceWillBegin"),
        $ = Symbol("onMouseForceDown"),
        k = Symbol("onMouseDown"),
        B = Symbol("onMouseForceChange"),
        q = Symbol("onMouseMove"),
        j = Symbol("onMouseUp"),
        _ = Symbol("onMouseForceGlobalChange");
    var H = Object.freeze({
        __proto__: null,
        DragMoveSensorEvent: d,
        DragPressureSensorEvent: g,
        DragSensor: class extends s {
            constructor(t = [], e = {}) {
                super(t, e),
                    (this.mouseDownTimeout = null),
                    (this.draggableElement = null),
                    (this.nativeDraggableElement = null),
                    (this[Y] = this[Y].bind(this)),
                    (this[T] = this[T].bind(this)),
                    (this[M] = this[M].bind(this)),
                    (this[A] = this[A].bind(this)),
                    (this[N] = this[N].bind(this)),
                    (this[z] = this[z].bind(this));
            }
            attach() {
                document.addEventListener("mousedown", this[Y], !0);
            }
            detach() {
                document.removeEventListener("mousedown", this[Y], !0);
            }
            [M](t) {
                t.dataTransfer.setData("text", ""),
                    (t.dataTransfer.effectAllowed = this.options.type);
                const e = document.elementFromPoint(t.clientX, t.clientY),
                    r = this.draggableElement;
                if (!r) return;
                const n = new h({
                    clientX: t.clientX,
                    clientY: t.clientY,
                    target: e,
                    originalSource: r,
                    container: this.currentContainer,
                    originalEvent: t,
                });
                setTimeout(() => {
                    this.trigger(this.currentContainer, n),
                        n.canceled()
                            ? (this.dragging = !1)
                            : (this.dragging = !0);
                }, 0);
            }
            [A](t) {
                if (!this.dragging) return;
                const e = document.elementFromPoint(t.clientX, t.clientY),
                    r = this.currentContainer,
                    n = new d({
                        clientX: t.clientX,
                        clientY: t.clientY,
                        target: e,
                        container: r,
                        originalEvent: t,
                    });
                this.trigger(r, n),
                    n.canceled() ||
                        (t.preventDefault(),
                        (t.dataTransfer.dropEffect = this.options.type));
            }
            [N](t) {
                if (!this.dragging) return;
                document.removeEventListener("mouseup", this[T], !0);
                const e = document.elementFromPoint(t.clientX, t.clientY),
                    r = this.currentContainer,
                    n = new u({
                        clientX: t.clientX,
                        clientY: t.clientY,
                        target: e,
                        container: r,
                        originalEvent: t,
                    });
                this.trigger(r, n),
                    (this.dragging = !1),
                    (this.startEvent = null),
                    this[P]();
            }
            [z](t) {
                t.preventDefault();
            }
            [Y](t) {
                if (t.target && (t.target.form || t.target.contenteditable))
                    return;
                const e = t.target;
                if (
                    ((this.currentContainer = i(e, this.containers)),
                    !this.currentContainer)
                )
                    return;
                if (this.options.handle && e && !i(e, this.options.handle))
                    return;
                const r = i(e, this.options.draggable);
                if (!r) return;
                const n = i(t.target, (t) => t.draggable);
                n && ((n.draggable = !1), (this.nativeDraggableElement = n)),
                    document.addEventListener("mouseup", this[T], !0),
                    document.addEventListener("dragstart", this[M], !1),
                    document.addEventListener("dragover", this[A], !1),
                    document.addEventListener("dragend", this[N], !1),
                    document.addEventListener("drop", this[z], !1),
                    (this.startEvent = t),
                    (this.mouseDownTimeout = setTimeout(() => {
                        (r.draggable = !0), (this.draggableElement = r);
                    }, this.delay.drag));
            }
            [T]() {
                this[P]();
            }
            [P]() {
                clearTimeout(this.mouseDownTimeout),
                    document.removeEventListener("mouseup", this[T], !0),
                    document.removeEventListener("dragstart", this[M], !1),
                    document.removeEventListener("dragover", this[A], !1),
                    document.removeEventListener("dragend", this[N], !1),
                    document.removeEventListener("drop", this[z], !1),
                    this.nativeDraggableElement &&
                        ((this.nativeDraggableElement.draggable = !0),
                        (this.nativeDraggableElement = null)),
                    this.draggableElement &&
                        ((this.draggableElement.draggable = !1),
                        (this.draggableElement = null));
            }
        },
        DragStartSensorEvent: h,
        DragStopSensorEvent: u,
        ForceTouchSensor: class extends s {
            constructor(t = [], e = {}) {
                super(t, e),
                    (this.mightDrag = !1),
                    (this[I] = this[I].bind(this)),
                    (this[$] = this[$].bind(this)),
                    (this[k] = this[k].bind(this)),
                    (this[B] = this[B].bind(this)),
                    (this[q] = this[q].bind(this)),
                    (this[j] = this[j].bind(this));
            }
            attach() {
                for (const t of this.containers)
                    t.addEventListener(
                        "webkitmouseforcewillbegin",
                        this[I],
                        !1
                    ),
                        t.addEventListener("webkitmouseforcedown", this[$], !1),
                        t.addEventListener("mousedown", this[k], !0),
                        t.addEventListener(
                            "webkitmouseforcechanged",
                            this[B],
                            !1
                        );
                document.addEventListener("mousemove", this[q]),
                    document.addEventListener("mouseup", this[j]);
            }
            detach() {
                for (const t of this.containers)
                    t.removeEventListener(
                        "webkitmouseforcewillbegin",
                        this[I],
                        !1
                    ),
                        t.removeEventListener(
                            "webkitmouseforcedown",
                            this[$],
                            !1
                        ),
                        t.removeEventListener("mousedown", this[k], !0),
                        t.removeEventListener(
                            "webkitmouseforcechanged",
                            this[B],
                            !1
                        );
                document.removeEventListener("mousemove", this[q]),
                    document.removeEventListener("mouseup", this[j]);
            }
            [I](t) {
                t.preventDefault(), (this.mightDrag = !0);
            }
            [$](t) {
                if (this.dragging) return;
                const e = document.elementFromPoint(t.clientX, t.clientY),
                    r = t.currentTarget;
                if (this.options.handle && e && !i(e, this.options.handle))
                    return;
                const n = i(e, this.options.draggable);
                if (!n) return;
                const s = new h({
                    clientX: t.clientX,
                    clientY: t.clientY,
                    target: e,
                    container: r,
                    originalSource: n,
                    originalEvent: t,
                });
                this.trigger(r, s),
                    (this.currentContainer = r),
                    (this.dragging = !s.canceled()),
                    (this.mightDrag = !1);
            }
            [j](t) {
                if (!this.dragging) return;
                const e = new u({
                    clientX: t.clientX,
                    clientY: t.clientY,
                    target: null,
                    container: this.currentContainer,
                    originalEvent: t,
                });
                this.trigger(this.currentContainer, e),
                    (this.currentContainer = null),
                    (this.dragging = !1),
                    (this.mightDrag = !1);
            }
            [k](t) {
                this.mightDrag &&
                    (t.stopPropagation(),
                    t.stopImmediatePropagation(),
                    t.preventDefault());
            }
            [q](t) {
                if (!this.dragging) return;
                const e = document.elementFromPoint(t.clientX, t.clientY),
                    r = new d({
                        clientX: t.clientX,
                        clientY: t.clientY,
                        target: e,
                        container: this.currentContainer,
                        originalEvent: t,
                    });
                this.trigger(this.currentContainer, r);
            }
            [B](t) {
                if (this.dragging) return;
                const e = t.target,
                    r = t.currentTarget,
                    n = new g({
                        pressure: t.webkitForce,
                        clientX: t.clientX,
                        clientY: t.clientY,
                        target: e,
                        container: r,
                        originalEvent: t,
                    });
                this.trigger(r, n);
            }
            [_](t) {
                if (!this.dragging) return;
                const e = t.target,
                    r = new g({
                        pressure: t.webkitForce,
                        clientX: t.clientX,
                        clientY: t.clientY,
                        target: e,
                        container: this.currentContainer,
                        originalEvent: t,
                    });
                this.trigger(this.currentContainer, r);
            }
        },
        MouseSensor: E,
        Sensor: s,
        SensorEvent: c,
        TouchSensor: F,
    });
    class R extends e {
        constructor(t) {
            super(t), (this.data = t);
        }
        get dragEvent() {
            return this.data.dragEvent;
        }
    }
    R.type = "collidable";
    class U extends R {
        get collidingElement() {
            return this.data.collidingElement;
        }
    }
    U.type = "collidable:in";
    class W extends R {
        get collidingElement() {
            return this.data.collidingElement;
        }
    }
    W.type = "collidable:out";
    const V = Symbol("onDragMove"),
        G = Symbol("onDragStop"),
        K = Symbol("onRequestAnimationFrame");
    function Z(t, e) {
        return function (r) {
            (function (t, e) {
                if (t.v)
                    throw new Error(
                        "attempted to call " +
                            e +
                            " after decoration was finished"
                    );
            })(e, "addInitializer"),
                tt(r, "An initializer"),
                t.push(r);
        };
    }
    function J(t, e) {
        if (!t(e))
            throw new TypeError(
                "Attempted to access private element on non-instance"
            );
    }
    function Q(t, e, r, n, s, i, o, a, l, c, h) {
        var d;
        switch (i) {
            case 1:
                d = "accessor";
                break;
            case 2:
                d = "method";
                break;
            case 3:
                d = "getter";
                break;
            case 4:
                d = "setter";
                break;
            default:
                d = "field";
        }
        var u,
            g,
            m = {
                kind: d,
                name: a ? "#" + r : r,
                static: o,
                private: a,
                metadata: h,
            },
            p = { v: !1 };
        if (
            (0 !== i && (m.addInitializer = Z(s, p)), a || (0 !== i && 2 !== i))
        )
            if (2 === i)
                u = function (t) {
                    return J(c, t), n.value;
                };
            else {
                var v = 0 === i || 1 === i;
                (v || 3 === i) &&
                    (u = a
                        ? function (t) {
                              return J(c, t), n.get.call(t);
                          }
                        : function (t) {
                              return n.get.call(t);
                          }),
                    (v || 4 === i) &&
                        (g = a
                            ? function (t, e) {
                                  J(c, t), n.set.call(t, e);
                              }
                            : function (t, e) {
                                  n.set.call(t, e);
                              });
            }
        else
            (u = function (t) {
                return t[r];
            }),
                0 === i &&
                    (g = function (t, e) {
                        t[r] = e;
                    });
        var f = a
            ? c.bind()
            : function (t) {
                  return r in t;
              };
        m.access =
            u && g
                ? { get: u, set: g, has: f }
                : u
                ? { get: u, has: f }
                : { set: g, has: f };
        try {
            return t.call(e, l, m);
        } finally {
            p.v = !0;
        }
    }
    function tt(t, e) {
        if ("function" != typeof t)
            throw new TypeError(e + " must be a function");
    }
    function et(t, e) {
        var r = typeof e;
        if (1 === t) {
            if ("object" !== r || null === e)
                throw new TypeError(
                    "accessor decorators must return an object with get, set, or init properties or void 0"
                );
            void 0 !== e.get && tt(e.get, "accessor.get"),
                void 0 !== e.set && tt(e.set, "accessor.set"),
                void 0 !== e.init && tt(e.init, "accessor.init");
        } else if ("function" !== r) {
            throw new TypeError(
                (0 === t ? "field" : 5 === t ? "class" : "method") +
                    " decorators must return a function or void 0"
            );
        }
    }
    function rt(t) {
        return function () {
            return t(this);
        };
    }
    function nt(t) {
        return function (e) {
            t(this, e);
        };
    }
    function st(t, e, r, n, s, i, o, a, l, c, h) {
        var d,
            u,
            g,
            m,
            p,
            v,
            f = r[0];
        n || Array.isArray(f) || (f = [f]),
            a
                ? (d =
                      0 === i || 1 === i
                          ? { get: rt(r[3]), set: nt(r[4]) }
                          : 3 === i
                          ? { get: r[3] }
                          : 4 === i
                          ? { set: r[3] }
                          : { value: r[3] })
                : 0 !== i && (d = Object.getOwnPropertyDescriptor(e, s)),
            1 === i
                ? (g = { get: d.get, set: d.set })
                : 2 === i
                ? (g = d.value)
                : 3 === i
                ? (g = d.get)
                : 4 === i && (g = d.set);
        for (var b = n ? 2 : 1, y = f.length - 1; y >= 0; y -= b) {
            var E;
            void 0 !==
                (m = Q(
                    f[y],
                    n ? f[y - 1] : void 0,
                    s,
                    d,
                    l,
                    i,
                    o,
                    a,
                    g,
                    c,
                    h
                )) &&
                (et(i, m),
                0 === i
                    ? (E = m)
                    : 1 === i
                    ? ((E = m.init),
                      (p = m.get || g.get),
                      (v = m.set || g.set),
                      (g = { get: p, set: v }))
                    : (g = m),
                void 0 !== E &&
                    (void 0 === u
                        ? (u = E)
                        : "function" == typeof u
                        ? (u = [u, E])
                        : u.push(E)));
        }
        if (0 === i || 1 === i) {
            if (void 0 === u)
                u = function (t, e) {
                    return e;
                };
            else if ("function" != typeof u) {
                var C = u;
                u = function (t, e) {
                    for (var r = e, n = C.length - 1; n >= 0; n--)
                        r = C[n].call(t, r);
                    return r;
                };
            } else {
                var S = u;
                u = function (t, e) {
                    return S.call(t, e);
                };
            }
            t.push(u);
        }
        0 !== i &&
            (1 === i
                ? ((d.get = g.get), (d.set = g.set))
                : 2 === i
                ? (d.value = g)
                : 3 === i
                ? (d.get = g)
                : 4 === i && (d.set = g),
            a
                ? 1 === i
                    ? (t.push(function (t, e) {
                          return g.get.call(t, e);
                      }),
                      t.push(function (t, e) {
                          return g.set.call(t, e);
                      }))
                    : 2 === i
                    ? t.push(g)
                    : t.push(function (t, e) {
                          return g.call(t, e);
                      })
                : Object.defineProperty(e, s, d));
    }
    function it(t, e) {
        e &&
            t.push(function (t) {
                for (var r = 0; r < e.length; r++) e[r].call(t);
                return t;
            });
    }
    function ot(t, e) {
        return Object.defineProperty(
            t,
            Symbol.metadata || Symbol.for("Symbol.metadata"),
            { configurable: !0, enumerable: !0, value: e }
        );
    }
    function at(t, e, r, n, s, i) {
        if (arguments.length >= 6)
            var o = i[Symbol.metadata || Symbol.for("Symbol.metadata")];
        var a = Object.create(void 0 === o ? null : o),
            l = (function (t, e, r, n) {
                for (
                    var s, i, o, a = [], l = new Map(), c = new Map(), h = 0;
                    h < e.length;
                    h++
                ) {
                    var d = e[h];
                    if (Array.isArray(d)) {
                        var u,
                            g,
                            m = d[1],
                            p = d[2],
                            v = d.length > 3,
                            f = 16 & m,
                            b = !!(8 & m),
                            y = r;
                        if (
                            ((m &= 7),
                            b
                                ? ((u = t),
                                  0 !== m && (g = i = i || []),
                                  v &&
                                      !o &&
                                      (o = function (e) {
                                          return lt(e) === t;
                                      }),
                                  (y = o))
                                : ((u = t.prototype),
                                  0 !== m && (g = s = s || [])),
                            0 !== m && !v)
                        ) {
                            var E = b ? c : l,
                                C = E.get(p) || 0;
                            if (
                                !0 === C ||
                                (3 === C && 4 !== m) ||
                                (4 === C && 3 !== m)
                            )
                                throw new Error(
                                    "Attempted to decorate a public method/accessor that has the same name as a previously decorated public method/accessor. This is not currently supported by the decorators plugin. Property name was: " +
                                        p
                                );
                            E.set(p, !(!C && m > 2) || m);
                        }
                        st(a, u, d, f, p, m, b, v, g, y, n);
                    }
                }
                return it(a, s), it(a, i), a;
            })(t, e, s, a);
        return (
            r.length || ot(t, a),
            {
                e: l,
                get c() {
                    return (function (t, e, r, n) {
                        if (e.length) {
                            for (
                                var s = [],
                                    i = t,
                                    o = t.name,
                                    a = r ? 2 : 1,
                                    l = e.length - 1;
                                l >= 0;
                                l -= a
                            ) {
                                var c = { v: !1 };
                                try {
                                    var h = e[l].call(
                                        r ? e[l - 1] : void 0,
                                        i,
                                        {
                                            kind: "class",
                                            name: o,
                                            addInitializer: Z(s, c),
                                            metadata: n,
                                        }
                                    );
                                } finally {
                                    c.v = !0;
                                }
                                void 0 !== h && (et(5, h), (i = h));
                            }
                            return [
                                ot(i, n),
                                function () {
                                    for (var t = 0; t < s.length; t++)
                                        s[t].call(i);
                                },
                            ];
                        }
                    })(t, r, n, a);
                },
            }
        );
    }
    function lt(t) {
        if (Object(t) !== t)
            throw TypeError(
                "right-hand side of 'in' should be an object, got " +
                    (null !== t ? typeof t : "null")
            );
        return t;
    }
    class ct extends e {
        constructor(t) {
            super(t), (this.data = t);
        }
        get source() {
            return this.data.source;
        }
        get originalSource() {
            return this.data.originalSource;
        }
        get mirror() {
            return this.data.mirror;
        }
        get sourceContainer() {
            return this.data.sourceContainer;
        }
        get sensorEvent() {
            return this.data.sensorEvent;
        }
        get originalEvent() {
            return this.sensorEvent ? this.sensorEvent.originalEvent : null;
        }
    }
    ct.type = "drag";
    class ht extends ct {}
    (ht.type = "drag:start"), (ht.cancelable = !0);
    class dt extends ct {}
    dt.type = "drag:move";
    class ut extends ct {
        get overContainer() {
            return this.data.overContainer;
        }
        get over() {
            return this.data.over;
        }
    }
    (ut.type = "drag:over"), (ut.cancelable = !0);
    class gt extends ct {
        get overContainer() {
            return this.data.overContainer;
        }
        get over() {
            return this.data.over;
        }
    }
    gt.type = "drag:out";
    class mt extends ct {
        get overContainer() {
            return this.data.overContainer;
        }
    }
    mt.type = "drag:over:container";
    class pt extends ct {
        get overContainer() {
            return this.data.overContainer;
        }
    }
    pt.type = "drag:out:container";
    class vt extends ct {
        get pressure() {
            return this.data.pressure;
        }
    }
    vt.type = "drag:pressure";
    class ft extends ct {}
    (ft.type = "drag:stop"), (ft.cancelable = !0);
    class bt extends ct {}
    var yt, Et;
    bt.type = "drag:stopped";
    class Ct extends r {
        constructor(t) {
            yt(super(t)),
                (this.lastWidth = 0),
                (this.lastHeight = 0),
                (this.mirror = null);
        }
        attach() {
            this.draggable
                .on("mirror:created", this.onMirrorCreated)
                .on("drag:over", this.onDragOver)
                .on("drag:over:container", this.onDragOver);
        }
        detach() {
            this.draggable
                .off("mirror:created", this.onMirrorCreated)
                .off("mirror:destroy", this.onMirrorDestroy)
                .off("drag:over", this.onDragOver)
                .off("drag:over:container", this.onDragOver);
        }
        getOptions() {
            return this.draggable.options.resizeMirror || {};
        }
        onMirrorCreated({ mirror: t }) {
            this.mirror = t;
        }
        onMirrorDestroy() {
            this.mirror = null;
        }
        onDragOver(t) {
            this.resize(t);
        }
        resize(t) {
            requestAnimationFrame(() => {
                let e = null;
                const { overContainer: r } = t;
                if (null == this.mirror || null == this.mirror.parentNode)
                    return;
                this.mirror.parentNode !== r && r.appendChild(this.mirror),
                    t.type === ut.type && (e = t.over);
                const n =
                    e || this.draggable.getDraggableElementsForContainer(r)[0];
                var s;
                n &&
                    ((s = () => {
                        const t = n.getBoundingClientRect();
                        null == this.mirror ||
                            (this.lastHeight === t.height &&
                                this.lastWidth === t.width) ||
                            ((this.mirror.style.width = `${t.width}px`),
                            (this.mirror.style.height = `${t.height}px`),
                            (this.lastWidth = t.width),
                            (this.lastHeight = t.height));
                    }),
                    requestAnimationFrame(() => {
                        requestAnimationFrame(s);
                    }));
            });
        }
    }
    (Et = Ct),
        ([yt] = at(
            Et,
            [
                [o, 2, "onMirrorCreated"],
                [o, 2, "onMirrorDestroy"],
                [o, 2, "onDragOver"],
            ],
            [],
            0,
            void 0,
            r
        ).e);
    class St extends e {
        get dragEvent() {
            return this.data.dragEvent;
        }
        get snappable() {
            return this.data.snappable;
        }
    }
    St.type = "snap";
    class wt extends St {}
    (wt.type = "snap:in"), (wt.cancelable = !0);
    class xt extends St {}
    (xt.type = "snap:out"), (xt.cancelable = !0);
    const Dt = Symbol("onDragStart"),
        Lt = Symbol("onDragStop"),
        Ot = Symbol("onDragOver"),
        Ft = Symbol("onDragOut"),
        Xt = Symbol("onMirrorCreated"),
        Yt = Symbol("onMirrorDestroy");
    var Tt, Mt;
    const At = { duration: 150, easingFunction: "ease-in-out", horizontal: !1 };
    class Nt extends r {
        constructor(t) {
            Tt(super(t)),
                (this.options = { ...At, ...this.getOptions() }),
                (this.lastAnimationFrame = null);
        }
        attach() {
            this.draggable.on("sortable:sorted", this.onSortableSorted);
        }
        detach() {
            this.draggable.off("sortable:sorted", this.onSortableSorted);
        }
        getOptions() {
            return this.draggable.options.swapAnimation || {};
        }
        onSortableSorted({ oldIndex: t, newIndex: e, dragEvent: r }) {
            const { source: n, over: s } = r;
            this.lastAnimationFrame &&
                cancelAnimationFrame(this.lastAnimationFrame),
                (this.lastAnimationFrame = requestAnimationFrame(() => {
                    t >= e ? zt(n, s, this.options) : zt(s, n, this.options);
                }));
        }
    }
    function zt(t, e, { duration: r, easingFunction: n, horizontal: s }) {
        for (const r of [t, e]) r.style.pointerEvents = "none";
        if (s) {
            const r = t.offsetWidth;
            (t.style.transform = `translate3d(${r}px, 0, 0)`),
                (e.style.transform = `translate3d(-${r}px, 0, 0)`);
        } else {
            const r = t.offsetHeight;
            (t.style.transform = `translate3d(0, ${r}px, 0)`),
                (e.style.transform = `translate3d(0, -${r}px, 0)`);
        }
        requestAnimationFrame(() => {
            for (const s of [t, e])
                s.addEventListener("transitionend", Pt),
                    (s.style.transition = `transform ${r}ms ${n}`),
                    (s.style.transform = "");
        });
    }
    function Pt(t) {
        var e;
        null != t.target &&
            ((e = t.target), Boolean("style" in e)) &&
            ((t.target.style.transition = ""),
            (t.target.style.pointerEvents = ""),
            t.target.removeEventListener("transitionend", Pt));
    }
    (Mt = Nt),
        ([Tt] = at(Mt, [[o, 2, "onSortableSorted"]], [], 0, void 0, r).e);
    const It = Symbol("onSortableSorted"),
        $t = Symbol("onSortableSort"),
        kt = { duration: 150, easingFunction: "ease-in-out" };
    function Bt(t) {
        (t.target.style.transition = ""),
            (t.target.style.pointerEvents = ""),
            t.target.removeEventListener("transitionend", Bt);
    }
    var qt = Object.freeze({
        __proto__: null,
        Collidable: class extends r {
            constructor(t) {
                super(t),
                    (this.currentlyCollidingElement = null),
                    (this.lastCollidingElement = null),
                    (this.currentAnimationFrame = null),
                    (this[V] = this[V].bind(this)),
                    (this[G] = this[G].bind(this)),
                    (this[K] = this[K].bind(this));
            }
            attach() {
                this.draggable
                    .on("drag:move", this[V])
                    .on("drag:stop", this[G]);
            }
            detach() {
                this.draggable
                    .off("drag:move", this[V])
                    .off("drag:stop", this[G]);
            }
            getCollidables() {
                const t = this.draggable.options.collidables;
                return "string" == typeof t
                    ? Array.prototype.slice.call(document.querySelectorAll(t))
                    : t instanceof NodeList || t instanceof Array
                    ? Array.prototype.slice.call(t)
                    : t instanceof HTMLElement
                    ? [t]
                    : "function" == typeof t
                    ? t()
                    : [];
            }
            [V](t) {
                const e = t.sensorEvent.target;
                (this.currentAnimationFrame = requestAnimationFrame(
                    this[K](e)
                )),
                    this.currentlyCollidingElement && t.cancel();
                const r = new U({
                        dragEvent: t,
                        collidingElement: this.currentlyCollidingElement,
                    }),
                    n = new W({
                        dragEvent: t,
                        collidingElement: this.lastCollidingElement,
                    }),
                    s = Boolean(
                        this.currentlyCollidingElement &&
                            this.lastCollidingElement !==
                                this.currentlyCollidingElement
                    ),
                    i = Boolean(
                        !this.currentlyCollidingElement &&
                            this.lastCollidingElement
                    );
                s
                    ? (this.lastCollidingElement && this.draggable.trigger(n),
                      this.draggable.trigger(r))
                    : i && this.draggable.trigger(n),
                    (this.lastCollidingElement =
                        this.currentlyCollidingElement);
            }
            [G](t) {
                const e =
                        this.currentlyCollidingElement ||
                        this.lastCollidingElement,
                    r = new W({ dragEvent: t, collidingElement: e });
                e && this.draggable.trigger(r),
                    (this.lastCollidingElement = null),
                    (this.currentlyCollidingElement = null);
            }
            [K](t) {
                return () => {
                    const e = this.getCollidables();
                    this.currentlyCollidingElement = i(t, (t) => e.includes(t));
                };
            }
        },
        ResizeMirror: Ct,
        Snappable: class extends r {
            constructor(t) {
                super(t),
                    (this.firstSource = null),
                    (this.mirror = null),
                    (this[Dt] = this[Dt].bind(this)),
                    (this[Lt] = this[Lt].bind(this)),
                    (this[Ot] = this[Ot].bind(this)),
                    (this[Ft] = this[Ft].bind(this)),
                    (this[Xt] = this[Xt].bind(this)),
                    (this[Yt] = this[Yt].bind(this));
            }
            attach() {
                this.draggable
                    .on("drag:start", this[Dt])
                    .on("drag:stop", this[Lt])
                    .on("drag:over", this[Ot])
                    .on("drag:out", this[Ft])
                    .on("droppable:over", this[Ot])
                    .on("droppable:out", this[Ft])
                    .on("mirror:created", this[Xt])
                    .on("mirror:destroy", this[Yt]);
            }
            detach() {
                this.draggable
                    .off("drag:start", this[Dt])
                    .off("drag:stop", this[Lt])
                    .off("drag:over", this[Ot])
                    .off("drag:out", this[Ft])
                    .off("droppable:over", this[Ot])
                    .off("droppable:out", this[Ft])
                    .off("mirror:created", this[Xt])
                    .off("mirror:destroy", this[Yt]);
            }
            [Dt](t) {
                t.canceled() || (this.firstSource = t.source);
            }
            [Lt]() {
                this.firstSource = null;
            }
            [Ot](t) {
                if (t.canceled()) return;
                const e = t.source || t.dragEvent.source;
                if (e === this.firstSource)
                    return void (this.firstSource = null);
                const r = new wt({
                    dragEvent: t,
                    snappable: t.over || t.droppable,
                });
                this.draggable.trigger(r),
                    r.canceled() ||
                        (this.mirror && (this.mirror.style.display = "none"),
                        e.classList.remove(
                            ...this.draggable.getClassNamesFor(
                                "source:dragging"
                            )
                        ),
                        e.classList.add(
                            ...this.draggable.getClassNamesFor("source:placed")
                        ),
                        setTimeout(() => {
                            e.classList.remove(
                                ...this.draggable.getClassNamesFor(
                                    "source:placed"
                                )
                            );
                        }, this.draggable.options.placedTimeout));
            }
            [Ft](t) {
                if (t.canceled()) return;
                const e = t.source || t.dragEvent.source,
                    r = new xt({
                        dragEvent: t,
                        snappable: t.over || t.droppable,
                    });
                this.draggable.trigger(r),
                    r.canceled() ||
                        (this.mirror && (this.mirror.style.display = ""),
                        e.classList.add(
                            ...this.draggable.getClassNamesFor(
                                "source:dragging"
                            )
                        ));
            }
            [Xt]({ mirror: t }) {
                this.mirror = t;
            }
            [Yt]() {
                this.mirror = null;
            }
        },
        SortAnimation: class extends r {
            constructor(t) {
                super(t),
                    (this.options = { ...kt, ...this.getOptions() }),
                    (this.lastAnimationFrame = null),
                    (this.lastElements = []),
                    (this[It] = this[It].bind(this)),
                    (this[$t] = this[$t].bind(this));
            }
            attach() {
                this.draggable.on("sortable:sort", this[$t]),
                    this.draggable.on("sortable:sorted", this[It]);
            }
            detach() {
                this.draggable.off("sortable:sort", this[$t]),
                    this.draggable.off("sortable:sorted", this[It]);
            }
            getOptions() {
                return this.draggable.options.sortAnimation || {};
            }
            [$t]({ dragEvent: t }) {
                const { sourceContainer: e } = t,
                    r = this.draggable.getDraggableElementsForContainer(e);
                this.lastElements = Array.from(r).map((t) => ({
                    domEl: t,
                    offsetTop: t.offsetTop,
                    offsetLeft: t.offsetLeft,
                }));
            }
            [It]({ oldIndex: t, newIndex: e }) {
                if (t === e) return;
                const r = [];
                let n, s, i;
                t > e
                    ? ((n = e), (s = t - 1), (i = 1))
                    : ((n = t + 1), (s = e), (i = -1));
                for (let t = n; t <= s; t++) {
                    const e = this.lastElements[t],
                        n = this.lastElements[t + i];
                    r.push({ from: e, to: n });
                }
                cancelAnimationFrame(this.lastAnimationFrame),
                    (this.lastAnimationFrame = requestAnimationFrame(() => {
                        r.forEach((t) =>
                            (function (
                                { from: t, to: e },
                                { duration: r, easingFunction: n }
                            ) {
                                const s = t.domEl,
                                    i = t.offsetLeft - e.offsetLeft,
                                    o = t.offsetTop - e.offsetTop;
                                (s.style.pointerEvents = "none"),
                                    (s.style.transform = `translate3d(${i}px, ${o}px, 0)`),
                                    requestAnimationFrame(() => {
                                        s.addEventListener("transitionend", Bt),
                                            (s.style.transition = `transform ${r}ms ${n}`),
                                            (s.style.transform = "");
                                    });
                            })(t, this.options)
                        );
                    }));
            }
        },
        SwapAnimation: Nt,
        defaultResizeMirrorOptions: {},
        defaultSortAnimationOptions: kt,
        defaultSwapAnimationOptions: At,
    });
    const jt = Symbol("onInitialize"),
        _t = Symbol("onDestroy"),
        Ht = Symbol("announceEvent"),
        Rt = Symbol("announceMessage"),
        Ut = { expire: 7e3 };
    const Wt = (function () {
        const t = document.createElement("div");
        return (
            t.setAttribute("id", "draggable-live-region"),
            t.setAttribute("aria-relevant", "additions"),
            t.setAttribute("aria-atomic", "true"),
            t.setAttribute("aria-live", "assertive"),
            t.setAttribute("role", "log"),
            (t.style.position = "fixed"),
            (t.style.width = "1px"),
            (t.style.height = "1px"),
            (t.style.top = "-1px"),
            (t.style.overflow = "hidden"),
            t
        );
    })();
    document.addEventListener("DOMContentLoaded", () => {
        document.body.appendChild(Wt);
    });
    const Vt = Symbol("onInitialize"),
        Gt = Symbol("onDestroy"),
        Kt = {};
    const Zt = [];
    class Jt extends e {
        constructor(t) {
            super(t), (this.data = t);
        }
        get source() {
            return this.data.source;
        }
        get originalSource() {
            return this.data.originalSource;
        }
        get sourceContainer() {
            return this.data.sourceContainer;
        }
        get sensorEvent() {
            return this.data.sensorEvent;
        }
        get dragEvent() {
            return this.data.dragEvent;
        }
        get originalEvent() {
            return this.sensorEvent ? this.sensorEvent.originalEvent : null;
        }
    }
    class Qt extends Jt {}
    Qt.type = "mirror:create";
    class te extends Jt {
        get mirror() {
            return this.data.mirror;
        }
    }
    te.type = "mirror:created";
    class ee extends Jt {
        get mirror() {
            return this.data.mirror;
        }
    }
    ee.type = "mirror:attached";
    class re extends Jt {
        get mirror() {
            return this.data.mirror;
        }
        get passedThreshX() {
            return this.data.passedThreshX;
        }
        get passedThreshY() {
            return this.data.passedThreshY;
        }
    }
    (re.type = "mirror:move"), (re.cancelable = !0);
    class ne extends Jt {
        get mirror() {
            return this.data.mirror;
        }
        get passedThreshX() {
            return this.data.passedThreshX;
        }
        get passedThreshY() {
            return this.data.passedThreshY;
        }
    }
    ne.type = "mirror:moved";
    class se extends Jt {
        get mirror() {
            return this.data.mirror;
        }
    }
    (se.type = "mirror:destroy"), (se.cancelable = !0);
    const ie = Symbol("onDragStart"),
        oe = Symbol("onDragMove"),
        ae = Symbol("onDragStop"),
        le = Symbol("onMirrorCreated"),
        ce = Symbol("onMirrorMove"),
        he = Symbol("onScroll"),
        de = Symbol("getAppendableContainer"),
        ue = {
            constrainDimensions: !1,
            xAxis: !0,
            yAxis: !0,
            cursorOffsetX: null,
            cursorOffsetY: null,
            thresholdX: null,
            thresholdY: null,
        };
    function ge({ source: t, ...e }) {
        return ye((r) => {
            const n = t.getBoundingClientRect();
            r({ source: t, sourceRect: n, ...e });
        });
    }
    function me({ sensorEvent: t, sourceRect: e, options: r, ...n }) {
        return ye((s) => {
            const i =
                    null === r.cursorOffsetY
                        ? t.clientY - e.top
                        : r.cursorOffsetY,
                o =
                    null === r.cursorOffsetX
                        ? t.clientX - e.left
                        : r.cursorOffsetX;
            s({
                sensorEvent: t,
                sourceRect: e,
                mirrorOffset: { top: i, left: o },
                options: r,
                ...n,
            });
        });
    }
    function pe({ mirror: t, source: e, options: r, ...n }) {
        return ye((s) => {
            let i, o;
            if (r.constrainDimensions) {
                const t = getComputedStyle(e);
                (i = t.getPropertyValue("height")),
                    (o = t.getPropertyValue("width"));
            }
            (t.style.display = null),
                (t.style.position = "fixed"),
                (t.style.pointerEvents = "none"),
                (t.style.top = 0),
                (t.style.left = 0),
                (t.style.margin = 0),
                r.constrainDimensions &&
                    ((t.style.height = i), (t.style.width = o)),
                s({ mirror: t, source: e, options: r, ...n });
        });
    }
    function ve({ mirror: t, mirrorClasses: e, ...r }) {
        return ye((n) => {
            t.classList.add(...e), n({ mirror: t, mirrorClasses: e, ...r });
        });
    }
    function fe({ mirror: t, ...e }) {
        return ye((r) => {
            t.removeAttribute("id"), delete t.id, r({ mirror: t, ...e });
        });
    }
    function be({ withFrame: t = !1, initial: e = !1 } = {}) {
        return ({
            mirror: r,
            sensorEvent: n,
            mirrorOffset: s,
            initialY: i,
            initialX: o,
            scrollOffset: a,
            options: l,
            passedThreshX: c,
            passedThreshY: h,
            lastMovedX: d,
            lastMovedY: u,
            ...g
        }) =>
            ye(
                (t) => {
                    const m = {
                        mirror: r,
                        sensorEvent: n,
                        mirrorOffset: s,
                        options: l,
                        ...g,
                    };
                    if (s) {
                        const t = c
                                ? Math.round(
                                      (n.clientX - s.left - a.x) /
                                          (l.thresholdX || 1)
                                  ) * (l.thresholdX || 1)
                                : Math.round(d),
                            g = h
                                ? Math.round(
                                      (n.clientY - s.top - a.y) /
                                          (l.thresholdY || 1)
                                  ) * (l.thresholdY || 1)
                                : Math.round(u);
                        (l.xAxis && l.yAxis) || e
                            ? (r.style.transform = `translate3d(${t}px, ${g}px, 0)`)
                            : l.xAxis && !l.yAxis
                            ? (r.style.transform = `translate3d(${t}px, ${i}px, 0)`)
                            : l.yAxis &&
                              !l.xAxis &&
                              (r.style.transform = `translate3d(${o}px, ${g}px, 0)`),
                            e && ((m.initialX = t), (m.initialY = g)),
                            (m.lastMovedX = t),
                            (m.lastMovedY = g);
                    }
                    t(m);
                },
                { frame: t }
            );
    }
    function ye(t, { raf: e = !1 } = {}) {
        return new Promise((r, n) => {
            e
                ? requestAnimationFrame(() => {
                      t(r, n);
                  })
                : t(r, n);
        });
    }
    const Ee = Symbol("onDragStart"),
        Ce = Symbol("onDragMove"),
        Se = Symbol("onDragStop"),
        we = Symbol("scroll"),
        xe = { speed: 6, sensitivity: 50, scrollableElements: [] };
    function De() {
        return document.scrollingElement || document.documentElement;
    }
    class Le {
        constructor() {
            this.callbacks = {};
        }
        on(t, ...e) {
            return (
                this.callbacks[t] || (this.callbacks[t] = []),
                this.callbacks[t].push(...e),
                this
            );
        }
        off(t, e) {
            if (!this.callbacks[t]) return null;
            const r = this.callbacks[t].slice(0);
            for (let n = 0; n < r.length; n++)
                e === r[n] && this.callbacks[t].splice(n, 1);
            return this;
        }
        trigger(t) {
            if (!this.callbacks[t.type]) return null;
            const e = [...this.callbacks[t.type]],
                r = [];
            for (let n = e.length - 1; n >= 0; n--) {
                const s = e[n];
                try {
                    s(t);
                } catch (t) {
                    r.push(t);
                }
            }
            return (
                r.length &&
                    console.error(
                        `Draggable caught errors while triggering '${t.type}'`,
                        r
                    ),
                this
            );
        }
    }
    class Oe extends e {
        get draggable() {
            return this.data.draggable;
        }
    }
    Oe.type = "draggable";
    class Fe extends Oe {}
    Fe.type = "draggable:initialize";
    class Xe extends Oe {}
    Xe.type = "draggable:destroy";
    const Ye = Symbol("onDragStart"),
        Te = Symbol("onDragMove"),
        Me = Symbol("onDragStop"),
        Ae = Symbol("onDragPressure"),
        Ne = Symbol("dragStop"),
        ze = {
            "drag:start": (t) =>
                `Picked up ${
                    t.source.textContent.trim() ||
                    t.source.id ||
                    "draggable element"
                }`,
            "drag:stop": (t) =>
                `Released ${
                    t.source.textContent.trim() ||
                    t.source.id ||
                    "draggable element"
                }`,
        },
        Pe = {
            "container:dragging": "draggable-container--is-dragging",
            "source:dragging": "draggable-source--is-dragging",
            "source:placed": "draggable-source--placed",
            "container:placed": "draggable-container--placed",
            "body:dragging": "draggable--is-dragging",
            "draggable:over": "draggable--over",
            "container:over": "draggable-container--over",
            "source:original": "draggable--original",
            mirror: "draggable-mirror",
        },
        Ie = {
            draggable: ".draggable-source",
            handle: null,
            delay: {},
            distance: 0,
            placedTimeout: 800,
            plugins: [],
            sensors: [],
            exclude: { plugins: [], sensors: [] },
        };
    class $e {
        constructor(t = [document.body], e = {}) {
            if (t instanceof NodeList || t instanceof Array)
                this.containers = [...t];
            else {
                if (!(t instanceof HTMLElement))
                    throw new Error(
                        "Draggable containers are expected to be of type `NodeList`, `HTMLElement[]` or `HTMLElement`"
                    );
                this.containers = [t];
            }
            (this.options = {
                ...Ie,
                ...e,
                classes: { ...Pe, ...(e.classes || {}) },
                announcements: { ...ze, ...(e.announcements || {}) },
                exclude: {
                    plugins: (e.exclude && e.exclude.plugins) || [],
                    sensors: (e.exclude && e.exclude.sensors) || [],
                },
            }),
                (this.emitter = new Le()),
                (this.dragging = !1),
                (this.plugins = []),
                (this.sensors = []),
                (this[Ye] = this[Ye].bind(this)),
                (this[Te] = this[Te].bind(this)),
                (this[Me] = this[Me].bind(this)),
                (this[Ae] = this[Ae].bind(this)),
                (this[Ne] = this[Ne].bind(this)),
                document.addEventListener("drag:start", this[Ye], !0),
                document.addEventListener("drag:move", this[Te], !0),
                document.addEventListener("drag:stop", this[Me], !0),
                document.addEventListener("drag:pressure", this[Ae], !0);
            const r = Object.values($e.Plugins).filter(
                    (t) => !this.options.exclude.plugins.includes(t)
                ),
                n = Object.values($e.Sensors).filter(
                    (t) => !this.options.exclude.sensors.includes(t)
                );
            this.addPlugin(...r, ...this.options.plugins),
                this.addSensor(...n, ...this.options.sensors);
            const s = new Fe({ draggable: this });
            this.on("mirror:created", ({ mirror: t }) => (this.mirror = t)),
                this.on("mirror:destroy", () => (this.mirror = null)),
                this.trigger(s);
        }
        destroy() {
            document.removeEventListener("drag:start", this[Ye], !0),
                document.removeEventListener("drag:move", this[Te], !0),
                document.removeEventListener("drag:stop", this[Me], !0),
                document.removeEventListener("drag:pressure", this[Ae], !0);
            const t = new Xe({ draggable: this });
            this.trigger(t),
                this.removePlugin(...this.plugins.map((t) => t.constructor)),
                this.removeSensor(...this.sensors.map((t) => t.constructor));
        }
        addPlugin(...t) {
            const e = t.map((t) => new t(this));
            return (
                e.forEach((t) => t.attach()),
                (this.plugins = [...this.plugins, ...e]),
                this
            );
        }
        removePlugin(...t) {
            return (
                this.plugins
                    .filter((e) => t.includes(e.constructor))
                    .forEach((t) => t.detach()),
                (this.plugins = this.plugins.filter(
                    (e) => !t.includes(e.constructor)
                )),
                this
            );
        }
        addSensor(...t) {
            const e = t.map((t) => new t(this.containers, this.options));
            return (
                e.forEach((t) => t.attach()),
                (this.sensors = [...this.sensors, ...e]),
                this
            );
        }
        removeSensor(...t) {
            return (
                this.sensors
                    .filter((e) => t.includes(e.constructor))
                    .forEach((t) => t.detach()),
                (this.sensors = this.sensors.filter(
                    (e) => !t.includes(e.constructor)
                )),
                this
            );
        }
        addContainer(...t) {
            return (
                (this.containers = [...this.containers, ...t]),
                this.sensors.forEach((e) => e.addContainer(...t)),
                this
            );
        }
        removeContainer(...t) {
            return (
                (this.containers = this.containers.filter(
                    (e) => !t.includes(e)
                )),
                this.sensors.forEach((e) => e.removeContainer(...t)),
                this
            );
        }
        on(t, ...e) {
            return this.emitter.on(t, ...e), this;
        }
        off(t, e) {
            return this.emitter.off(t, e), this;
        }
        trigger(t) {
            return this.emitter.trigger(t), this;
        }
        getClassNameFor(t) {
            return this.getClassNamesFor(t)[0];
        }
        getClassNamesFor(t) {
            const e = this.options.classes[t];
            return e instanceof Array
                ? e
                : "string" == typeof e || e instanceof String
                ? [e]
                : [];
        }
        isDragging() {
            return Boolean(this.dragging);
        }
        getDraggableElements() {
            return this.containers.reduce(
                (t, e) => [...t, ...this.getDraggableElementsForContainer(e)],
                []
            );
        }
        getDraggableElementsForContainer(t) {
            return [...t.querySelectorAll(this.options.draggable)].filter(
                (t) => t !== this.originalSource && t !== this.mirror
            );
        }
        cancel() {
            this[Ne]();
        }
        [Ye](t) {
            const e = ke(t),
                { target: r, container: n, originalSource: s } = e;
            if (!this.containers.includes(n)) return;
            if (this.options.handle && r && !i(r, this.options.handle))
                return void e.cancel();
            (this.originalSource = s),
                (this.sourceContainer = n),
                this.lastPlacedSource &&
                    this.lastPlacedContainer &&
                    (clearTimeout(this.placedTimeoutID),
                    this.lastPlacedSource.classList.remove(
                        ...this.getClassNamesFor("source:placed")
                    ),
                    this.lastPlacedContainer.classList.remove(
                        ...this.getClassNamesFor("container:placed")
                    )),
                (this.source = this.originalSource.cloneNode(!0)),
                this.originalSource.parentNode.insertBefore(
                    this.source,
                    this.originalSource
                ),
                (this.originalSource.style.display = "none");
            const o = new ht({
                source: this.source,
                originalSource: this.originalSource,
                sourceContainer: n,
                sensorEvent: e,
            });
            if (
                (this.trigger(o), (this.dragging = !o.canceled()), o.canceled())
            )
                return (
                    this.source.remove(),
                    void (this.originalSource.style.display = null)
                );
            this.originalSource.classList.add(
                ...this.getClassNamesFor("source:original")
            ),
                this.source.classList.add(
                    ...this.getClassNamesFor("source:dragging")
                ),
                this.sourceContainer.classList.add(
                    ...this.getClassNamesFor("container:dragging")
                ),
                document.body.classList.add(
                    ...this.getClassNamesFor("body:dragging")
                ),
                Be(document.body, "none"),
                requestAnimationFrame(() => {
                    const e = ke(t).clone({ target: this.source });
                    this[Te]({ ...t, detail: e });
                });
        }
        [Te](t) {
            if (!this.dragging) return;
            const e = ke(t),
                { container: r } = e;
            let n = e.target;
            const s = new dt({
                source: this.source,
                originalSource: this.originalSource,
                sourceContainer: r,
                sensorEvent: e,
            });
            this.trigger(s),
                s.canceled() && e.cancel(),
                (n = i(n, this.options.draggable));
            const o = i(e.target, this.containers),
                a = e.overContainer || o,
                l =
                    this.currentOverContainer &&
                    a !== this.currentOverContainer,
                c = this.currentOver && n !== this.currentOver,
                h = a && this.currentOverContainer !== a,
                d = o && n && this.currentOver !== n;
            if (c) {
                const t = new gt({
                    source: this.source,
                    originalSource: this.originalSource,
                    sourceContainer: r,
                    sensorEvent: e,
                    over: this.currentOver,
                    overContainer: this.currentOverContainer,
                });
                this.currentOver.classList.remove(
                    ...this.getClassNamesFor("draggable:over")
                ),
                    (this.currentOver = null),
                    this.trigger(t);
            }
            if (l) {
                const t = new pt({
                    source: this.source,
                    originalSource: this.originalSource,
                    sourceContainer: r,
                    sensorEvent: e,
                    overContainer: this.currentOverContainer,
                });
                this.currentOverContainer.classList.remove(
                    ...this.getClassNamesFor("container:over")
                ),
                    (this.currentOverContainer = null),
                    this.trigger(t);
            }
            if (h) {
                a.classList.add(...this.getClassNamesFor("container:over"));
                const t = new mt({
                    source: this.source,
                    originalSource: this.originalSource,
                    sourceContainer: r,
                    sensorEvent: e,
                    overContainer: a,
                });
                (this.currentOverContainer = a), this.trigger(t);
            }
            if (d) {
                n.classList.add(...this.getClassNamesFor("draggable:over"));
                const t = new ut({
                    source: this.source,
                    originalSource: this.originalSource,
                    sourceContainer: r,
                    sensorEvent: e,
                    overContainer: a,
                    over: n,
                });
                (this.currentOver = n), this.trigger(t);
            }
        }
        [Ne](t) {
            if (!this.dragging) return;
            this.dragging = !1;
            const e = new ft({
                source: this.source,
                originalSource: this.originalSource,
                sensorEvent: t ? t.sensorEvent : null,
                sourceContainer: this.sourceContainer,
            });
            this.trigger(e),
                e.canceled() ||
                    this.source.parentNode.insertBefore(
                        this.originalSource,
                        this.source
                    ),
                this.source.remove(),
                (this.originalSource.style.display = ""),
                this.source.classList.remove(
                    ...this.getClassNamesFor("source:dragging")
                ),
                this.originalSource.classList.remove(
                    ...this.getClassNamesFor("source:original")
                ),
                this.originalSource.classList.add(
                    ...this.getClassNamesFor("source:placed")
                ),
                this.sourceContainer.classList.add(
                    ...this.getClassNamesFor("container:placed")
                ),
                this.sourceContainer.classList.remove(
                    ...this.getClassNamesFor("container:dragging")
                ),
                document.body.classList.remove(
                    ...this.getClassNamesFor("body:dragging")
                ),
                Be(document.body, ""),
                this.currentOver &&
                    this.currentOver.classList.remove(
                        ...this.getClassNamesFor("draggable:over")
                    ),
                this.currentOverContainer &&
                    this.currentOverContainer.classList.remove(
                        ...this.getClassNamesFor("container:over")
                    ),
                (this.lastPlacedSource = this.originalSource),
                (this.lastPlacedContainer = this.sourceContainer),
                (this.placedTimeoutID = setTimeout(() => {
                    this.lastPlacedSource &&
                        this.lastPlacedSource.classList.remove(
                            ...this.getClassNamesFor("source:placed")
                        ),
                        this.lastPlacedContainer &&
                            this.lastPlacedContainer.classList.remove(
                                ...this.getClassNamesFor("container:placed")
                            ),
                        (this.lastPlacedSource = null),
                        (this.lastPlacedContainer = null);
                }, this.options.placedTimeout));
            const r = new bt({
                source: this.source,
                originalSource: this.originalSource,
                sensorEvent: t ? t.sensorEvent : null,
                sourceContainer: this.sourceContainer,
            });
            this.trigger(r),
                (this.source = null),
                (this.originalSource = null),
                (this.currentOverContainer = null),
                (this.currentOver = null),
                (this.sourceContainer = null);
        }
        [Me](t) {
            this[Ne](t);
        }
        [Ae](t) {
            if (!this.dragging) return;
            const e = ke(t),
                r =
                    this.source ||
                    i(e.originalEvent.target, this.options.draggable),
                n = new vt({ sensorEvent: e, source: r, pressure: e.pressure });
            this.trigger(n);
        }
    }
    function ke(t) {
        return t.detail;
    }
    function Be(t, e) {
        (t.style.webkitUserSelect = e),
            (t.style.mozUserSelect = e),
            (t.style.msUserSelect = e),
            (t.style.oUserSelect = e),
            (t.style.userSelect = e);
    }
    ($e.Plugins = {
        Announcement: class extends r {
            constructor(t) {
                super(t),
                    (this.options = { ...Ut, ...this.getOptions() }),
                    (this.originalTriggerMethod = this.draggable.trigger),
                    (this[jt] = this[jt].bind(this)),
                    (this[_t] = this[_t].bind(this));
            }
            attach() {
                this.draggable.on("draggable:initialize", this[jt]);
            }
            detach() {
                this.draggable.off("draggable:destroy", this[_t]);
            }
            getOptions() {
                return this.draggable.options.announcements || {};
            }
            [Ht](t) {
                const e = this.options[t.type];
                e && "string" == typeof e && this[Rt](e),
                    e && "function" == typeof e && this[Rt](e(t));
            }
            [Rt](t) {
                !(function (t, { expire: e }) {
                    const r = document.createElement("div");
                    (r.textContent = t),
                        Wt.appendChild(r),
                        setTimeout(() => {
                            Wt.removeChild(r);
                        }, e);
                })(t, { expire: this.options.expire });
            }
            [jt]() {
                this.draggable.trigger = (t) => {
                    try {
                        this[Ht](t);
                    } finally {
                        this.originalTriggerMethod.call(this.draggable, t);
                    }
                };
            }
            [_t]() {
                this.draggable.trigger = this.originalTriggerMethod;
            }
        },
        Focusable: class extends r {
            constructor(t) {
                super(t),
                    (this.options = { ...Kt, ...this.getOptions() }),
                    (this[Vt] = this[Vt].bind(this)),
                    (this[Gt] = this[Gt].bind(this));
            }
            attach() {
                this.draggable
                    .on("draggable:initialize", this[Vt])
                    .on("draggable:destroy", this[Gt]);
            }
            detach() {
                this.draggable
                    .off("draggable:initialize", this[Vt])
                    .off("draggable:destroy", this[Gt]),
                    this[Gt]();
            }
            getOptions() {
                return this.draggable.options.focusable || {};
            }
            getElements() {
                return [
                    ...this.draggable.containers,
                    ...this.draggable.getDraggableElements(),
                ];
            }
            [Vt]() {
                requestAnimationFrame(() => {
                    this.getElements().forEach((t) =>
                        (function (t) {
                            const e = Boolean(
                                !t.getAttribute("tabindex") && -1 === t.tabIndex
                            );
                            e && (Zt.push(t), (t.tabIndex = 0));
                        })(t)
                    );
                });
            }
            [Gt]() {
                requestAnimationFrame(() => {
                    this.getElements().forEach((t) =>
                        (function (t) {
                            const e = Zt.indexOf(t);
                            -1 !== e && ((t.tabIndex = -1), Zt.splice(e, 1));
                        })(t)
                    );
                });
            }
        },
        Mirror: class extends r {
            constructor(t) {
                super(t),
                    (this.options = { ...ue, ...this.getOptions() }),
                    (this.scrollOffset = { x: 0, y: 0 }),
                    (this.initialScrollOffset = {
                        x: window.scrollX,
                        y: window.scrollY,
                    }),
                    (this[ie] = this[ie].bind(this)),
                    (this[oe] = this[oe].bind(this)),
                    (this[ae] = this[ae].bind(this)),
                    (this[le] = this[le].bind(this)),
                    (this[ce] = this[ce].bind(this)),
                    (this[he] = this[he].bind(this));
            }
            attach() {
                this.draggable
                    .on("drag:start", this[ie])
                    .on("drag:move", this[oe])
                    .on("drag:stop", this[ae])
                    .on("mirror:created", this[le])
                    .on("mirror:move", this[ce]);
            }
            detach() {
                this.draggable
                    .off("drag:start", this[ie])
                    .off("drag:move", this[oe])
                    .off("drag:stop", this[ae])
                    .off("mirror:created", this[le])
                    .off("mirror:move", this[ce]);
            }
            getOptions() {
                return this.draggable.options.mirror || {};
            }
            [ie](t) {
                if (t.canceled()) return;
                "ontouchstart" in window &&
                    document.addEventListener("scroll", this[he], !0),
                    (this.initialScrollOffset = {
                        x: window.scrollX,
                        y: window.scrollY,
                    });
                const {
                    source: e,
                    originalSource: r,
                    sourceContainer: n,
                    sensorEvent: s,
                } = t;
                this.lastMirrorMovedClient = { x: s.clientX, y: s.clientY };
                const i = new Qt({
                    source: e,
                    originalSource: r,
                    sourceContainer: n,
                    sensorEvent: s,
                    dragEvent: t,
                });
                if (
                    (this.draggable.trigger(i),
                    (function (t) {
                        return /^drag/.test(t.originalEvent.type);
                    })(s) || i.canceled())
                )
                    return;
                const o = this[de](e) || n;
                this.mirror = e.cloneNode(!0);
                const a = new te({
                        source: e,
                        originalSource: r,
                        sourceContainer: n,
                        sensorEvent: s,
                        dragEvent: t,
                        mirror: this.mirror,
                    }),
                    l = new ee({
                        source: e,
                        originalSource: r,
                        sourceContainer: n,
                        sensorEvent: s,
                        dragEvent: t,
                        mirror: this.mirror,
                    });
                this.draggable.trigger(a),
                    o.appendChild(this.mirror),
                    this.draggable.trigger(l);
            }
            [oe](t) {
                if (!this.mirror || t.canceled()) return;
                const {
                    source: e,
                    originalSource: r,
                    sourceContainer: n,
                    sensorEvent: s,
                } = t;
                let i = !0,
                    o = !0;
                if (this.options.thresholdX || this.options.thresholdY) {
                    const { x: t, y: e } = this.lastMirrorMovedClient;
                    if (
                        (Math.abs(t - s.clientX) < this.options.thresholdX
                            ? (i = !1)
                            : (this.lastMirrorMovedClient.x = s.clientX),
                        Math.abs(e - s.clientY) < this.options.thresholdY
                            ? (o = !1)
                            : (this.lastMirrorMovedClient.y = s.clientY),
                        !i && !o)
                    )
                        return;
                }
                const a = new re({
                    source: e,
                    originalSource: r,
                    sourceContainer: n,
                    sensorEvent: s,
                    dragEvent: t,
                    mirror: this.mirror,
                    passedThreshX: i,
                    passedThreshY: o,
                });
                this.draggable.trigger(a);
            }
            [ae](t) {
                if (
                    ("ontouchstart" in window &&
                        document.removeEventListener("scroll", this[he], !0),
                    (this.initialScrollOffset = { x: 0, y: 0 }),
                    (this.scrollOffset = { x: 0, y: 0 }),
                    !this.mirror)
                )
                    return;
                const { source: e, sourceContainer: r, sensorEvent: n } = t,
                    s = new se({
                        source: e,
                        mirror: this.mirror,
                        sourceContainer: r,
                        sensorEvent: n,
                        dragEvent: t,
                    });
                this.draggable.trigger(s), s.canceled() || this.mirror.remove();
            }
            [he]() {
                this.scrollOffset = {
                    x: window.scrollX - this.initialScrollOffset.x,
                    y: window.scrollY - this.initialScrollOffset.y,
                };
            }
            [le]({ mirror: t, source: e, sensorEvent: r }) {
                const n = this.draggable.getClassNamesFor("mirror");
                t.style.display = "none";
                const s = {
                    mirror: t,
                    source: e,
                    sensorEvent: r,
                    mirrorClasses: n,
                    scrollOffset: this.scrollOffset,
                    options: this.options,
                    passedThreshX: !0,
                    passedThreshY: !0,
                };
                return Promise.resolve(s)
                    .then(ge)
                    .then(me)
                    .then(pe)
                    .then(ve)
                    .then(be({ initial: !0 }))
                    .then(fe)
                    .then(
                        ({
                            mirrorOffset: t,
                            initialX: e,
                            initialY: r,
                            ...n
                        }) => (
                            (this.mirrorOffset = t),
                            (this.initialX = e),
                            (this.initialY = r),
                            (this.lastMovedX = e),
                            (this.lastMovedY = r),
                            { mirrorOffset: t, initialX: e, initialY: r, ...n }
                        )
                    );
            }
            [ce](t) {
                if (t.canceled()) return null;
                const e = {
                    mirror: t.mirror,
                    sensorEvent: t.sensorEvent,
                    mirrorOffset: this.mirrorOffset,
                    options: this.options,
                    initialX: this.initialX,
                    initialY: this.initialY,
                    scrollOffset: this.scrollOffset,
                    passedThreshX: t.passedThreshX,
                    passedThreshY: t.passedThreshY,
                    lastMovedX: this.lastMovedX,
                    lastMovedY: this.lastMovedY,
                };
                return Promise.resolve(e)
                    .then(be({ raf: !0 }))
                    .then(
                        ({ lastMovedX: t, lastMovedY: e, ...r }) => (
                            (this.lastMovedX = t),
                            (this.lastMovedY = e),
                            { lastMovedX: t, lastMovedY: e, ...r }
                        )
                    )
                    .then((e) => {
                        const r = new ne({
                            source: t.source,
                            originalSource: t.originalSource,
                            sourceContainer: t.sourceContainer,
                            sensorEvent: t.sensorEvent,
                            dragEvent: t.dragEvent,
                            mirror: this.mirror,
                            passedThreshX: t.passedThreshX,
                            passedThreshY: t.passedThreshY,
                        });
                        return this.draggable.trigger(r), e;
                    });
            }
            [de](t) {
                const e = this.options.appendTo;
                return "string" == typeof e
                    ? document.querySelector(e)
                    : e instanceof HTMLElement
                    ? e
                    : "function" == typeof e
                    ? e(t)
                    : t.parentNode;
            }
        },
        Scrollable: class extends r {
            constructor(t) {
                super(t),
                    (this.options = { ...xe, ...this.getOptions() }),
                    (this.currentMousePosition = null),
                    (this.scrollAnimationFrame = null),
                    (this.scrollableElement = null),
                    (this.findScrollableElementFrame = null),
                    (this[Ee] = this[Ee].bind(this)),
                    (this[Ce] = this[Ce].bind(this)),
                    (this[Se] = this[Se].bind(this)),
                    (this[we] = this[we].bind(this));
            }
            attach() {
                this.draggable
                    .on("drag:start", this[Ee])
                    .on("drag:move", this[Ce])
                    .on("drag:stop", this[Se]);
            }
            detach() {
                this.draggable
                    .off("drag:start", this[Ee])
                    .off("drag:move", this[Ce])
                    .off("drag:stop", this[Se]);
            }
            getOptions() {
                return this.draggable.options.scrollable || {};
            }
            getScrollableElement(t) {
                return this.hasDefinedScrollableElements()
                    ? i(t, this.options.scrollableElements) ||
                          document.documentElement
                    : (function (t) {
                          if (!t) return De();
                          const e =
                                  getComputedStyle(t).getPropertyValue(
                                      "position"
                                  ),
                              r = "absolute" === e,
                              n = i(
                                  t,
                                  (t) =>
                                      (!r ||
                                          !(function (t) {
                                              const e =
                                                  getComputedStyle(
                                                      t
                                                  ).getPropertyValue(
                                                      "position"
                                                  );
                                              return "static" === e;
                                          })(t)) &&
                                      (function (t) {
                                          const e = /(auto|scroll)/,
                                              r = getComputedStyle(t, null),
                                              n =
                                                  r.getPropertyValue(
                                                      "overflow"
                                                  ) +
                                                  r.getPropertyValue(
                                                      "overflow-y"
                                                  ) +
                                                  r.getPropertyValue(
                                                      "overflow-x"
                                                  );
                                          return e.test(n);
                                      })(t)
                              );
                          return "fixed" !== e && n ? n : De();
                      })(t);
            }
            hasDefinedScrollableElements() {
                return Boolean(0 !== this.options.scrollableElements.length);
            }
            [Ee](t) {
                this.findScrollableElementFrame = requestAnimationFrame(() => {
                    this.scrollableElement = this.getScrollableElement(
                        t.source
                    );
                });
            }
            [Ce](t) {
                if (
                    ((this.findScrollableElementFrame = requestAnimationFrame(
                        () => {
                            this.scrollableElement = this.getScrollableElement(
                                t.sensorEvent.target
                            );
                        }
                    )),
                    !this.scrollableElement)
                )
                    return;
                const e = t.sensorEvent,
                    r = { x: 0, y: 0 };
                "ontouchstart" in window &&
                    ((r.y =
                        window.pageYOffset ||
                        document.documentElement.scrollTop ||
                        document.body.scrollTop ||
                        0),
                    (r.x =
                        window.pageXOffset ||
                        document.documentElement.scrollLeft ||
                        document.body.scrollLeft ||
                        0)),
                    (this.currentMousePosition = {
                        clientX: e.clientX - r.x,
                        clientY: e.clientY - r.y,
                    }),
                    (this.scrollAnimationFrame = requestAnimationFrame(
                        this[we]
                    ));
            }
            [Se]() {
                cancelAnimationFrame(this.scrollAnimationFrame),
                    cancelAnimationFrame(this.findScrollableElementFrame),
                    (this.scrollableElement = null),
                    (this.scrollAnimationFrame = null),
                    (this.findScrollableElementFrame = null),
                    (this.currentMousePosition = null);
            }
            [we]() {
                if (!this.scrollableElement || !this.currentMousePosition)
                    return;
                cancelAnimationFrame(this.scrollAnimationFrame);
                const { speed: t, sensitivity: e } = this.options,
                    r = this.scrollableElement.getBoundingClientRect(),
                    n = r.bottom > window.innerHeight,
                    s = r.top < 0 || n,
                    i = De(),
                    o = this.scrollableElement,
                    a = this.currentMousePosition.clientX,
                    l = this.currentMousePosition.clientY;
                if (
                    o === document.body ||
                    o === document.documentElement ||
                    s
                ) {
                    const { innerHeight: r, innerWidth: n } = window;
                    l < e
                        ? (i.scrollTop -= t)
                        : r - l < e && (i.scrollTop += t),
                        a < e
                            ? (i.scrollLeft -= t)
                            : n - a < e && (i.scrollLeft += t);
                } else {
                    const { offsetHeight: n, offsetWidth: s } = o;
                    r.top + n - l < e
                        ? (o.scrollTop += t)
                        : l - r.top < e && (o.scrollTop -= t),
                        r.left + s - a < e
                            ? (o.scrollLeft += t)
                            : a - r.left < e && (o.scrollLeft -= t);
                }
                this.scrollAnimationFrame = requestAnimationFrame(this[we]);
            }
        },
    }),
        ($e.Sensors = { MouseSensor: E, TouchSensor: F });
    class qe extends e {
        constructor(t) {
            super(t), (this.data = t);
        }
        get dragEvent() {
            return this.data.dragEvent;
        }
    }
    qe.type = "droppable";
    class je extends qe {
        get dropzone() {
            return this.data.dropzone;
        }
    }
    (je.type = "droppable:start"), (je.cancelable = !0);
    class _e extends qe {
        get dropzone() {
            return this.data.dropzone;
        }
    }
    (_e.type = "droppable:dropped"), (_e.cancelable = !0);
    class He extends qe {
        get dropzone() {
            return this.data.dropzone;
        }
    }
    (He.type = "droppable:returned"), (He.cancelable = !0);
    class Re extends qe {
        get dropzone() {
            return this.data.dropzone;
        }
    }
    (Re.type = "droppable:stop"), (Re.cancelable = !0);
    const Ue = Symbol("onDragStart"),
        We = Symbol("onDragMove"),
        Ve = Symbol("onDragStop"),
        Ge = Symbol("dropInDropZone"),
        Ke = Symbol("returnToOriginalDropzone"),
        Ze = Symbol("closestDropzone"),
        Je = Symbol("getDropzones");
    const Qe = {
            "droppable:dropped": function ({ dragEvent: t, dropzone: e }) {
                return `Dropped ${
                    t.source.textContent.trim() ||
                    t.source.id ||
                    "draggable element"
                } into ${e.textContent.trim() || e.id || "droppable element"}`;
            },
            "droppable:returned": function ({ dragEvent: t, dropzone: e }) {
                return `Returned ${
                    t.source.textContent.trim() ||
                    t.source.id ||
                    "draggable element"
                } from ${e.textContent.trim() || e.id || "droppable element"}`;
            },
        },
        tr = {
            "droppable:active": "draggable-dropzone--active",
            "droppable:occupied": "draggable-dropzone--occupied",
        },
        er = { dropzone: ".draggable-droppable" };
    class rr extends e {
        constructor(t) {
            super(t), (this.data = t);
        }
        get dragEvent() {
            return this.data.dragEvent;
        }
    }
    rr.type = "swappable";
    class nr extends rr {}
    (nr.type = "swappable:start"), (nr.cancelable = !0);
    class sr extends rr {
        get over() {
            return this.data.over;
        }
        get overContainer() {
            return this.data.overContainer;
        }
    }
    (sr.type = "swappable:swap"), (sr.cancelable = !0);
    class ir extends rr {
        get swappedElement() {
            return this.data.swappedElement;
        }
    }
    ir.type = "swappable:swapped";
    class or extends rr {}
    or.type = "swappable:stop";
    const ar = Symbol("onDragStart"),
        lr = Symbol("onDragOver"),
        cr = Symbol("onDragStop");
    const hr = {
        "swappabled:swapped": function ({ dragEvent: t, swappedElement: e }) {
            return `Swapped ${
                t.source.textContent.trim() ||
                t.source.id ||
                "swappable element"
            } with ${e.textContent.trim() || e.id || "swappable element"}`;
        },
    };
    function dr(t, e) {
        const r = e.parentNode,
            n = t.parentNode;
        !(function (t) {
            const e = document.createElement("div");
            t(e), e.remove();
        })((s) => {
            n.insertBefore(s, t), r.insertBefore(t, e), n.insertBefore(e, s);
        });
    }
    class ur extends e {
        constructor(t) {
            super(t), (this.data = t);
        }
        get dragEvent() {
            return this.data.dragEvent;
        }
    }
    ur.type = "sortable";
    class gr extends ur {
        get startIndex() {
            return this.data.startIndex;
        }
        get startContainer() {
            return this.data.startContainer;
        }
    }
    (gr.type = "sortable:start"), (gr.cancelable = !0);
    class mr extends ur {
        get currentIndex() {
            return this.data.currentIndex;
        }
        get over() {
            return this.data.over;
        }
        get overContainer() {
            return this.data.dragEvent.overContainer;
        }
    }
    (mr.type = "sortable:sort"), (mr.cancelable = !0);
    class pr extends ur {
        get oldIndex() {
            return this.data.oldIndex;
        }
        get newIndex() {
            return this.data.newIndex;
        }
        get oldContainer() {
            return this.data.oldContainer;
        }
        get newContainer() {
            return this.data.newContainer;
        }
    }
    pr.type = "sortable:sorted";
    class vr extends ur {
        get oldIndex() {
            return this.data.oldIndex;
        }
        get newIndex() {
            return this.data.newIndex;
        }
        get oldContainer() {
            return this.data.oldContainer;
        }
        get newContainer() {
            return this.data.newContainer;
        }
    }
    vr.type = "sortable:stop";
    const fr = Symbol("onDragStart"),
        br = Symbol("onDragOverContainer"),
        yr = Symbol("onDragOver"),
        Er = Symbol("onDragStop");
    const Cr = {
        "sortable:sorted": function ({ dragEvent: t }) {
            const e =
                t.source.textContent.trim() ||
                t.source.id ||
                "sortable element";
            if (t.over) {
                const r =
                    t.over.textContent.trim() ||
                    t.over.id ||
                    "sortable element";
                return t.source.compareDocumentPosition(t.over) &
                    Node.DOCUMENT_POSITION_FOLLOWING
                    ? `Placed ${e} after ${r}`
                    : `Placed ${e} before ${r}`;
            }
            return `Placed ${e} into a different container`;
        },
    };
    function Sr(t) {
        return Array.prototype.indexOf.call(t.parentNode.children, t);
    }
    function wr({ source: t, over: e, overContainer: r, children: n }) {
        const s = !n.length,
            i = t.parentNode !== r,
            o = e && t.parentNode === e.parentNode;
        return s
            ? (function (t, e) {
                  const r = t.parentNode;
                  return e.appendChild(t), { oldContainer: r, newContainer: e };
              })(t, r)
            : o
            ? (function (t, e) {
                  const r = Sr(t),
                      n = Sr(e);
                  r < n
                      ? t.parentNode.insertBefore(t, e.nextElementSibling)
                      : t.parentNode.insertBefore(t, e);
                  return {
                      oldContainer: t.parentNode,
                      newContainer: t.parentNode,
                  };
              })(t, e)
            : i
            ? (function (t, e, r) {
                  const n = t.parentNode;
                  e ? e.parentNode.insertBefore(t, e) : r.appendChild(t);
                  return { oldContainer: n, newContainer: t.parentNode };
              })(t, e, r)
            : null;
    }
    (t.BaseEvent = e),
        (t.BasePlugin = r),
        (t.Draggable = $e),
        (t.Droppable = class extends $e {
            constructor(t = [], e = {}) {
                super(t, {
                    ...er,
                    ...e,
                    classes: { ...tr, ...(e.classes || {}) },
                    announcements: { ...Qe, ...(e.announcements || {}) },
                }),
                    (this.dropzones = null),
                    (this.lastDropzone = null),
                    (this.initialDropzone = null),
                    (this[Ue] = this[Ue].bind(this)),
                    (this[We] = this[We].bind(this)),
                    (this[Ve] = this[Ve].bind(this)),
                    this.on("drag:start", this[Ue])
                        .on("drag:move", this[We])
                        .on("drag:stop", this[Ve]);
            }
            destroy() {
                super.destroy(),
                    this.off("drag:start", this[Ue])
                        .off("drag:move", this[We])
                        .off("drag:stop", this[Ve]);
            }
            [Ue](t) {
                if (t.canceled()) return;
                this.dropzones = [...this[Je]()];
                const e = i(t.sensorEvent.target, this.options.dropzone);
                if (!e) return void t.cancel();
                const r = new je({ dragEvent: t, dropzone: e });
                if ((this.trigger(r), r.canceled())) t.cancel();
                else {
                    this.initialDropzone = e;
                    for (const t of this.dropzones)
                        t.classList.contains(
                            this.getClassNameFor("droppable:occupied")
                        ) ||
                            t.classList.add(
                                ...this.getClassNamesFor("droppable:active")
                            );
                }
            }
            [We](t) {
                if (t.canceled()) return;
                const e = this[Ze](t.sensorEvent.target);
                e &&
                !e.classList.contains(
                    this.getClassNameFor("droppable:occupied")
                ) &&
                this[Ge](t, e)
                    ? (this.lastDropzone = e)
                    : (e && e !== this.initialDropzone) ||
                      !this.lastDropzone ||
                      (this[Ke](t), (this.lastDropzone = null));
            }
            [Ve](t) {
                const e = new Re({
                    dragEvent: t,
                    dropzone: this.lastDropzone || this.initialDropzone,
                });
                this.trigger(e);
                const r = this.getClassNamesFor("droppable:occupied");
                for (const t of this.dropzones)
                    t.classList.remove(
                        ...this.getClassNamesFor("droppable:active")
                    );
                this.lastDropzone &&
                    this.lastDropzone !== this.initialDropzone &&
                    this.initialDropzone.classList.remove(...r),
                    (this.dropzones = null),
                    (this.lastDropzone = null),
                    (this.initialDropzone = null);
            }
            [Ge](t, e) {
                const r = new _e({ dragEvent: t, dropzone: e });
                if ((this.trigger(r), r.canceled())) return !1;
                const n = this.getClassNamesFor("droppable:occupied");
                return (
                    this.lastDropzone &&
                        this.lastDropzone.classList.remove(...n),
                    e.appendChild(t.source),
                    e.classList.add(...n),
                    !0
                );
            }
            [Ke](t) {
                const e = new He({ dragEvent: t, dropzone: this.lastDropzone });
                this.trigger(e),
                    e.canceled() ||
                        (this.initialDropzone.appendChild(t.source),
                        this.lastDropzone.classList.remove(
                            ...this.getClassNamesFor("droppable:occupied")
                        ));
            }
            [Ze](t) {
                return this.dropzones ? i(t, this.dropzones) : null;
            }
            [Je]() {
                const t = this.options.dropzone;
                return "string" == typeof t
                    ? document.querySelectorAll(t)
                    : t instanceof NodeList || t instanceof Array
                    ? t
                    : "function" == typeof t
                    ? t()
                    : [];
            }
        }),
        (t.Plugins = qt),
        (t.Sensors = H),
        (t.Sortable = class extends $e {
            constructor(t = [], e = {}) {
                super(t, {
                    ...e,
                    announcements: { ...Cr, ...(e.announcements || {}) },
                }),
                    (this.startIndex = null),
                    (this.startContainer = null),
                    (this[fr] = this[fr].bind(this)),
                    (this[br] = this[br].bind(this)),
                    (this[yr] = this[yr].bind(this)),
                    (this[Er] = this[Er].bind(this)),
                    this.on("drag:start", this[fr])
                        .on("drag:over:container", this[br])
                        .on("drag:over", this[yr])
                        .on("drag:stop", this[Er]);
            }
            destroy() {
                super.destroy(),
                    this.off("drag:start", this[fr])
                        .off("drag:over:container", this[br])
                        .off("drag:over", this[yr])
                        .off("drag:stop", this[Er]);
            }
            index(t) {
                return this.getSortableElementsForContainer(
                    t.parentNode
                ).indexOf(t);
            }
            getSortableElementsForContainer(t) {
                return [...t.querySelectorAll(this.options.draggable)].filter(
                    (e) =>
                        e !== this.originalSource &&
                        e !== this.mirror &&
                        e.parentNode === t
                );
            }
            [fr](t) {
                (this.startContainer = t.source.parentNode),
                    (this.startIndex = this.index(t.source));
                const e = new gr({
                    dragEvent: t,
                    startIndex: this.startIndex,
                    startContainer: this.startContainer,
                });
                this.trigger(e), e.canceled() && t.cancel();
            }
            [br](t) {
                if (t.canceled()) return;
                const { source: e, over: r, overContainer: n } = t,
                    s = this.index(e),
                    i = new mr({
                        dragEvent: t,
                        currentIndex: s,
                        source: e,
                        over: r,
                    });
                if ((this.trigger(i), i.canceled())) return;
                const o = wr({
                    source: e,
                    over: r,
                    overContainer: n,
                    children: this.getSortableElementsForContainer(n),
                });
                if (!o) return;
                const { oldContainer: a, newContainer: l } = o,
                    c = this.index(t.source),
                    h = new pr({
                        dragEvent: t,
                        oldIndex: s,
                        newIndex: c,
                        oldContainer: a,
                        newContainer: l,
                    });
                this.trigger(h);
            }
            [yr](t) {
                if (t.over === t.originalSource || t.over === t.source) return;
                const { source: e, over: r, overContainer: n } = t,
                    s = this.index(e),
                    i = new mr({
                        dragEvent: t,
                        currentIndex: s,
                        source: e,
                        over: r,
                    });
                if ((this.trigger(i), i.canceled())) return;
                const o = wr({
                    source: e,
                    over: r,
                    overContainer: n,
                    children: this.getDraggableElementsForContainer(n),
                });
                if (!o) return;
                const { oldContainer: a, newContainer: l } = o,
                    c = this.index(e),
                    h = new pr({
                        dragEvent: t,
                        oldIndex: s,
                        newIndex: c,
                        oldContainer: a,
                        newContainer: l,
                    });
                this.trigger(h);
            }
            [Er](t) {
                const e = new vr({
                    dragEvent: t,
                    oldIndex: this.startIndex,
                    newIndex: this.index(t.source),
                    oldContainer: this.startContainer,
                    newContainer: t.source.parentNode,
                });
                this.trigger(e),
                    (this.startIndex = null),
                    (this.startContainer = null);
            }
        }),
        (t.Swappable = class extends $e {
            constructor(t = [], e = {}) {
                super(t, {
                    ...e,
                    announcements: { ...hr, ...(e.announcements || {}) },
                }),
                    (this.lastOver = null),
                    (this[ar] = this[ar].bind(this)),
                    (this[lr] = this[lr].bind(this)),
                    (this[cr] = this[cr].bind(this)),
                    this.on("drag:start", this[ar])
                        .on("drag:over", this[lr])
                        .on("drag:stop", this[cr]);
            }
            destroy() {
                super.destroy(),
                    this.off("drag:start", this._onDragStart)
                        .off("drag:over", this._onDragOver)
                        .off("drag:stop", this._onDragStop);
            }
            [ar](t) {
                const e = new nr({ dragEvent: t });
                this.trigger(e), e.canceled() && t.cancel();
            }
            [lr](t) {
                if (
                    t.over === t.originalSource ||
                    t.over === t.source ||
                    t.canceled()
                )
                    return;
                const e = new sr({
                    dragEvent: t,
                    over: t.over,
                    overContainer: t.overContainer,
                });
                if ((this.trigger(e), e.canceled())) return;
                this.lastOver &&
                    this.lastOver !== t.over &&
                    dr(this.lastOver, t.source),
                    this.lastOver === t.over
                        ? (this.lastOver = null)
                        : (this.lastOver = t.over),
                    dr(t.source, t.over);
                const r = new ir({ dragEvent: t, swappedElement: t.over });
                this.trigger(r);
            }
            [cr](t) {
                const e = new or({ dragEvent: t });
                this.trigger(e), (this.lastOver = null);
            }
        });
});
