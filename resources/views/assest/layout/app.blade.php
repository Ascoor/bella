
<!doctype html>
<html lang="ar"  dir="rtl">

<head>
    <meta charset=utf-8>
    <script data-ezscrex=false data-cfasync=false data-pagespeed-no-defer>
        var __ez = __ez || {};
        __ez.stms = Date.now();
        __ez.evt = {};
        __ez.script = {};
        __ez.ck = __ez.ck || {};
        __ez.template = {};
        __ez.template.isOrig = false;
        __ez.queue = function () {
            var e = 0,
                i = 0,
                t = [],
                n = !1,
                o = [],
                s = [],
                r = !0,
                a = function (e, i, n, o, s, r, a) {
                    var l = arguments.length > 7 && void 0 !== arguments[7] ? arguments[7] : window,
                        c = this;
                    this.name = e, this.funcName = i, this.parameters = null === n ? null : p(n) ? n : [n], this
                        .isBlock = o, this.blockedBy = s, this.deleteWhenComplete = r, this.isError = !1, this
                        .isComplete = !1, this.isInitialized = !1, this.proceedIfError = a, this.fWindow = l, this
                        .isTimeDelay = !1, this.process = function () {
                            f("... func = " + e), c.isInitialized = !0, c.isComplete = !0, f("... func.apply: " +
                            e);
                            var i = c.funcName.split("."),
                                n = null,
                                o = this.fWindow || window;
                            i.length > 3 || (n = 3 === i.length ? o[i[0]][i[1]][i[2]] : 2 === i.length ? o[i[0]][i[
                                    1]] : o[c.funcName]), null != n && n.apply(null, this.parameters), !0 === c
                                .deleteWhenComplete && delete t[e], !0 === c.isBlock && (f("----- F'D: " + c.name),
                                    u())
                        }
                },
                l = function (e, i, t, n, o, s, r) {
                    var a = arguments.length > 7 && void 0 !== arguments[7] ? arguments[7] : window,
                        l = this;
                    this.name = e, this.path = i, this.async = o, this.defer = s, this.isBlock = t, this.blockedBy =
                        n, this.isInitialized = !1, this.isError = !1, this.isComplete = !1, this.proceedIfError =
                        r, this.fWindow = a, this.isTimeDelay = !1, this.isPath = function (e) {
                            return "/" === e[0] && "/" !== e[1]
                        }, this.getSrc = function (e) {
                            return void 0 !== window.__ezScriptHost && this.isPath(e) ? window.__ezScriptHost + e :
                                e
                        }, this.process = function () {
                            l.isInitialized = !0, f("... file = " + e);
                            var i = this.fWindow ? this.fWindow.document : document,
                                t = i.createElement("script");
                            t.src = this.getSrc(this.path), !0 === o ? t.async = !0 : !0 === s && (t.defer = !0), t
                                .onerror = function () {
                                    f("----- ERR'D: " + l.name), l.isError = !0, !0 === l.isBlock && u()
                                }, t.onreadystatechange = t.onload = function () {
                                    var e = t.readyState;
                                    f("----- F'D: " + l.name), e && !/loaded|complete/.test(e) || (l.isComplete = !
                                        0, !0 === l.isBlock && u())
                                }, i.getElementsByTagName("head")[0].appendChild(t)
                        }
                },
                c = function (e, i) {
                    this.name = e, this.path = "", this.async = !1, this.defer = !1, this.isBlock = !1, this
                        .blockedBy = [], this.isInitialized = !0, this.isError = !1, this.isComplete = i, this
                        .proceedIfError = !1, this.isTimeDelay = !1, this.process = function () {}
                };

            function d(e) {
                !0 !== h(e) && 0 != r && e.process()
            }

            function h(e) {
                if (!0 === e.isTimeDelay && !1 === n) return f(e.name + " blocked = TIME DELAY!"), !0;
                if (p(e.blockedBy))
                    for (var i = 0; i < e.blockedBy.length; i++) {
                        var o = e.blockedBy[i];
                        if (!1 === t.hasOwnProperty(o)) return f(e.name + " blocked = " + o), !0;
                        if (!0 === e.proceedIfError && !0 === t[o].isError) return !1;
                        if (!1 === t[o].isComplete) return f(e.name + " blocked = " + o), !0
                    }
                return !1
            }

            function f(e) {
                var i = window.location.href,
                    t = new RegExp("[?&]ezq=([^&#]*)", "i").exec(i);
                "1" === (t ? t[1] : null) && console.debug(e)
            }

            function u() {
                ++e > 200 || (f("let's go"), m(o), m(s))
            }

            function m(e) {
                for (var i in e)
                    if (!1 !== e.hasOwnProperty(i)) {
                        var t = e[i];
                        !0 === t.isComplete || h(t) || !0 === t.isInitialized || !0 === t.isError ? !0 === t
                            .isError ? f(t.name + ": error") : !0 === t.isComplete ? f(t.name +
                                ": complete already") : !0 === t.isInitialized && f(t.name +
                                ": initialized already") : t.process()
                    }
            }

            function p(e) {
                return "[object Array]" == Object.prototype.toString.call(e)
            }
            return window.addEventListener("load", (function () {
                setTimeout((function () {
                    n = !0, f("TDELAY -----"), u()
                }), 5e3)
            }), !1), {
                addFile: function (e, i, n, r, a, c, h, f, u) {
                    var m = new l(e, i, n, r, a, c, h, u);
                    !0 === f ? o[e] = m : s[e] = m, t[e] = m, d(m)
                },
                addDelayFile: function (e, i) {
                    var n = new l(e, i, !1, [], !1, !1, !0);
                    n.isTimeDelay = !0, f(e + " ...  FILE! TDELAY"), s[e] = n, t[e] = n, d(n)
                },
                addFunc: function (e, n, r, l, c, h, f, u, m, p) {
                    !0 === h && (e = e + "_" + i++);
                    var y = new a(e, n, r, l, c, f, u, p);
                    !0 === m ? o[e] = y : s[e] = y, t[e] = y, d(y)
                },
                addDelayFunc: function (e, i, n) {
                    var o = new a(e, i, n, !1, [], !0, !0);
                    o.isTimeDelay = !0, f(e + " ...  FUNCTION! TDELAY"), s[e] = o, t[e] = o, d(o)
                },
                items: t,
                processAll: u,
                setallowLoad: function (e) {
                    r = e
                },
                markLoaded: function (e) {
                    if (e && 0 !== e.length) {
                        if (e in t) {
                            var i = t[e];
                            !0 === i.isComplete ? f(i.name + " " + e + ": error loaded duplicate") : (i
                                .isComplete = !0, i.isInitialized = !0)
                        } else t[e] = new c(e, !0);
                        f("markLoaded dummyfile: " + t[e].name)
                    }
                },
                logWhatsBlocked: function () {
                    for (var e in t) !1 !== t.hasOwnProperty(e) && h(t[e])
                }
            }
        }();
        __ez.evt.add = function (e, t, n) {
            e.addEventListener ? e.addEventListener(t, n, !1) : e.attachEvent ? e.attachEvent("on" + t, n) : e[
                "on" + t] = n()
        }, __ez.evt.remove = function (e, t, n) {
            e.removeEventListener ? e.removeEventListener(t, n, !1) : e.detachEvent ? e.detachEvent("on" + t, n) :
                delete e["on" + t]
        };
        __ez.script.add = function (e) {
            var t = document.createElement("script");
            t.src = e, t.async = !0, t.type = "text/javascript", document.getElementsByTagName("head")[0]
                .appendChild(t)
        };
        __ez.dot = {};
    </script>
    <link rel=preconnect href=//fonts.googleapis.com crossorigin>
    <link rel=preconnect href=//fonts.gstatic.com crossorigin>
    <link rel=preconnect href=//kit.fontawesome.com crossorigin>
    <link rel=preconnect href=//cdn.jsdelivr.net crossorigin>
    <link rel=preconnect href=//code.jquery.com crossorigin>
    <link rel=preconnect href=//www.ezoic.com crossorigin>
    <link rel=preconnect href=//static.tapfiliate.com crossorigin>
    <link rel=preconnect href=//go.ezoic.net crossorigin>
    <style class=ezcritcss>
        :root {
            --bs-blue: #0d6efd;
            --bs-indigo: #6610f2;
            --bs-purple: #6f42c1;
            --bs-pink: #d63384;
            --bs-red: #dc3545;
            --bs-orange: #fd7e14;
            --bs-yellow: #ffc107;
            --bs-green: #198754;
            --bs-teal: #20c997;
            --bs-cyan: #0dcaf0;
            --bs-white: #fff;
            --bs-gray: #6c757d;
            --bs-gray-dark: #343a40;
            --bs-gray-100: #f8f9fa;
            --bs-gray-200: #e9ecef;
            --bs-gray-300: #dee2e6;
            --bs-gray-400: #ced4da;
            --bs-gray-500: #adb5bd;
            --bs-gray-600: #6c757d;
            --bs-gray-700: #495057;
            --bs-gray-800: #343a40;
            --bs-gray-900: #212529;
            --bs-primary: #0d6efd;
            --bs-secondary: #6c757d;
            --bs-success: #198754;
            --bs-info: #0dcaf0;
            --bs-warning: #ffc107;
            --bs-danger: #dc3545;
            --bs-light: #f8f9fa;
            --bs-dark: #212529;
            --bs-primary-rgb: 13, 110, 253;
            --bs-secondary-rgb: 108, 117, 125;
            --bs-success-rgb: 25, 135, 84;
            --bs-info-rgb: 13, 202, 240;
            --bs-warning-rgb: 255, 193, 7;
            --bs-danger-rgb: 220, 53, 69;
            --bs-light-rgb: 248, 249, 250;
            --bs-dark-rgb: 33, 37, 41;
            --bs-white-rgb: 255, 255, 255;
            --bs-black-rgb: 0, 0, 0;
            --bs-body-color-rgb: 33, 37, 41;
            --bs-body-bg-rgb: 255, 255, 255;
            --bs-font-sans-serif: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            --bs-font-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
            --bs-gradient: linear-gradient(180deg, rgba(255, 255, 255, 0.15), rgba(255, 255, 255, 0));
            --bs-body-font-family: var(--bs-font-sans-serif);
            --bs-body-font-size: 1rem;
            --bs-body-font-weight: 400;
            --bs-body-line-height: 1.5;
            --bs-body-color: #212529;
            --bs-body-bg: #fff
        }

        *,
        ::after,
        ::before {
            box-sizing: border-box
        }

        @media(prefers-reduced-motion:no-preference) {
            :root {
                scroll-behavior: smooth
            }
        }

        body {
            margin: 0;
            font-family: var(--bs-body-font-family);
            font-size: var(--bs-body-font-size);
            font-weight: var(--bs-body-font-weight);
            line-height: var(--bs-body-line-height);
            color: var(--bs-body-color);
            text-align: var(--bs-body-text-align);
            background-color: var(--bs-body-bg);
            -webkit-text-size-adjust: 100%
        }

        h1,
        h2 {
            margin-top: 0;
            margin-bottom: .5rem;
            font-weight: 500;
            line-height: 1.2
        }

        h1 {
            font-size: calc(1.375rem + 1.5vw)
        }

        @media(min-width:1200px) {
            h1 {
                font-size: 2.5rem
            }
        }

        h2 {
            font-size: calc(1.325rem + .9vw)
        }

        @media(min-width:1200px) {
            h2 {
                font-size: 2rem
            }
        }

        p {
            margin-top: 0;
            margin-bottom: 1rem
        }

        small {
            font-size: .875em
        }

        a {
            color: #0d6efd;
            text-decoration: underline
        }

        code {
            font-family: var(--bs-font-monospace);
            font-size: 1em;
            direction: ltr;
            unicode-bidi: bidi-override
        }

        code {
            font-size: .875em;
            color: #d63384;
            word-wrap: break-word
        }

        img {
            vertical-align: middle
        }

        button {
            border-radius: 0
        }

        button {
            margin: 0;
            font-family: inherit;
            font-size: inherit;
            line-height: inherit
        }

        button {
            text-transform: none
        }

        [type=button],
        button {
            -webkit-appearance: button
        }

        ::-moz-focus-inner {
            padding: 0;
            border-style: none
        }

        ::-webkit-datetime-edit-day-field,
        ::-webkit-datetime-edit-fields-wrapper,
        ::-webkit-datetime-edit-hour-field,
        ::-webkit-datetime-edit-minute,
        ::-webkit-datetime-edit-month-field,
        ::-webkit-datetime-edit-text,
        ::-webkit-datetime-edit-year-field {
            padding: 0
        }

        ::-webkit-inner-spin-button {
            height: auto
        }

        ::-webkit-search-decoration {
            -webkit-appearance: none
        }

        ::-webkit-color-swatch-wrapper {
            padding: 0
        }

        ::-webkit-file-upload-button {
            font: inherit
        }

        ::file-selector-button {
            font: inherit
        }

        ::-webkit-file-upload-button {
            font: inherit;
            -webkit-appearance: button
        }

        .display-2 {
            font-size: calc(1.575rem + 3.9vw);
            font-weight: 300;
            line-height: 1.2
        }

        @media(min-width:1200px) {
            .display-2 {
                font-size: 4.5rem
            }
        }

        .container,
        .container-fluid {
            width: 100%;
            padding-right: var(--bs-gutter-x, .75rem);
            padding-left: var(--bs-gutter-x, .75rem);
            margin-right: auto;
            margin-left: auto
        }

        @media(min-width:576px) {
            .container {
                max-width: 540px
            }
        }

        @media(min-width:768px) {
            .container {
                max-width: 720px
            }
        }

        @media(min-width:992px) {
            .container {
                max-width: 960px
            }
        }

        @media(min-width:1200px) {
            .container {
                max-width: 1140px
            }
        }

        @media(min-width:1400px) {
            .container {
                max-width: 1320px
            }
        }

        .row {
            --bs-gutter-x: 1.5rem;
            --bs-gutter-y: 0;
            display: flex;
            flex-wrap: wrap;
            margin-top: calc(-1*var(--bs-gutter-y));
            margin-right: calc(-.5*var(--bs-gutter-x));
            margin-left: calc(-.5*var(--bs-gutter-x))
        }

        .row>* {
            flex-shrink: 0;
            width: 100%;
            max-width: 100%;
            padding-right: calc(var(--bs-gutter-x)*.5);
            padding-left: calc(var(--bs-gutter-x)*.5);
            margin-top: var(--bs-gutter-y)
        }

        .col {
            flex: 1 0
        }

        .btn {
            display: inline-block;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            text-align: center;
            text-decoration: none;
            vertical-align: middle;
            background-color: initial;
            border: 1px solid transparent;
            padding: .375rem .75rem;
            font-size: 1rem;
            border-radius: .25rem
        }

        .btn-danger {
            color: #fff;
            background-color: #dc3545;
            border-color: #dc3545
        }

        .btn-outline-danger {
            color: #dc3545;
            border-color: #dc3545
        }

        .btn-lg {
            padding: .5rem 1rem;
            font-size: 1.25rem;
            border-radius: .3rem
        }

        .collapse:not(.show) {
            display: none
        }

        .navbar-brand {
            padding-top: .3125rem;
            padding-bottom: .3125rem;
            margin-right: 1rem;
            font-size: 1.25rem;
            text-decoration: none;
            white-space: nowrap
        }

        .navbar-collapse {
            flex-basis: 100%;
            flex-grow: 1;
            align-items: center
        }

        .align-middle {
            vertical-align: middle !important
        }

        .d-inline-block {
            display: inline-block !important
        }

        .d-flex {
            display: flex !important
        }

        .d-none {
            display: none !important
        }

        .shadow-lg {
            box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important
        }

        .w-50 {
            width: 50% !important
        }

        .w-100 {
            width: 100% !important
        }

        .flex-grow-1 {
            flex-grow: 1 !important
        }

        .justify-content-between {
            justify-content: space-between !important
        }

        .align-items-center {
            align-items: center !important
        }

        .m-3 {
            margin: 1rem !important
        }

        .mx-3 {
            margin-right: 1rem !important;
            margin-left: 1rem !important
        }

        .my-3 {
            margin-top: 1rem !important;
            margin-bottom: 1rem !important
        }

        .my-4 {
            margin-top: 1.5rem !important;
            margin-bottom: 1.5rem !important
        }

        .my-5 {
            margin-top: 3rem !important;
            margin-bottom: 3rem !important
        }

        .mt-3 {
            margin-top: 1rem !important
        }

        .mt-4 {
            margin-top: 1.5rem !important
        }

        .me-2 {
            margin-right: .5rem !important
        }

        .mb-3 {
            margin-bottom: 1rem !important
        }

        .p-2 {
            padding: .5rem !important
        }

        .p-4 {
            padding: 1.5rem !important
        }

        .px-2 {
            padding-right: .5rem !important;
            padding-left: .5rem !important
        }

        .px-4 {
            padding-right: 1.5rem !important;
            padding-left: 1.5rem !important
        }

        .pt-2 {
            padding-top: .5rem !important
        }

        .fs-3 {
            font-size: calc(1.3rem + .6vw) !important
        }

        .fs-5 {
            font-size: 1.25rem !important
        }

        .fs-6 {
            font-size: 1rem !important
        }

        .text-end {
            text-align: right !important
        }

        .text-center {
            text-align: center !important
        }

        .text-uppercase {
            text-transform: uppercase !important
        }

        .text-secondary {
            --bs-text-opacity: 1;
            color: rgba(var(--bs-secondary-rgb), var(--bs-text-opacity)) !important
        }

        .text-danger {
            --bs-text-opacity: 1;
            color: rgba(var(--bs-danger-rgb), var(--bs-text-opacity)) !important
        }

        .text-white {
            --bs-text-opacity: 1;
            color: rgba(var(--bs-white-rgb), var(--bs-text-opacity)) !important
        }

        .text-muted {
            --bs-text-opacity: 1;
            color: #6c757d !important
        }

        .bg-danger {
            --bs-bg-opacity: 1;
            background-color: rgba(var(--bs-danger-rgb), var(--bs-bg-opacity)) !important
        }

        .bg-light {
            --bs-bg-opacity: 1;
            background-color: rgba(var(--bs-light-rgb), var(--bs-bg-opacity)) !important
        }

        .rounded-0 {
            border-radius: 0 !important
        }

        @media(min-width:576px) {
            .d-sm-inline-block {
                display: inline-block !important
            }

            .d-sm-block {
                display: block !important
            }
        }

        @media(min-width:768px) {
            .d-md-inline-block {
                display: inline-block !important
            }

            .d-md-none {
                display: none !important
            }
        }

        @media(min-width:992px) {
            .d-lg-inline-block {
                display: inline-block !important
            }

            .d-lg-none {
                display: none !important
            }
        }

        @media(min-width:1200px) {
            .fs-3 {
                font-size: 1.75rem !important
            }
        }
    </style>
    <script data-ezscrex=false data-cfasync=false data-pagespeed-no-defer
        src="//sf.ezoiccdn.com/tardisrocinante/cash.js?cb=4"></script>
    <script type=text/ez-screx>(function(){function storageAvailable(type){var storage;try{storage=window[type];var x='__storage_test__';storage.setItem(x,x);storage.removeItem(x);return true;}
catch(e){return e instanceof DOMException&&(e.code===22||e.code===1014||e.name==='QuotaExceededError'||e.name==='NS_ERROR_DOM_QUOTA_REACHED')&&(storage&&storage.length!==0);}}
function remove_ama_config(){if(storageAvailable('localStorage')){localStorage.removeItem("google_ama_config");}}
remove_ama_config()})()</script>
    <script data-ezscrex=false data-cfasync=false>
        __ez.ssaf = [17, 19, 16];
        __ez.sswp = 4;
        __ez.ssv = 429908;
        __ez.sshsdef = false;
    </script>
    <script>
        var ezoicTestActive = true
    </script>
    <script data-ezscrex=false data-cfasync=false>
        var _ezaq = {
            "ab_test_id": "mod138",
            "ad_cache_level": 1,
            "ad_count_adjustment": 1,
            "ad_lazyload_version": 1,
            "ad_load_version": 1,
            "ad_location_ids": "",
            "adx_ad_count": 0,
            "bidder_method": 1,
            "bidder_version": 3,
            "city": "Al Mansurah",
            "country": "EG",
            "days_since_last_visit": -1,
            "display_ad_count": 0,
            "domain_id": 350378,
            "ds_adsize_opt_id": -1,
            "engaged_time_visit": 19,
            "ezcache_level": 1,
            "ezcache_skip_code": 7,
            "form_factor_id": 1,
            "framework_id": 1,
            "has_bad_image": 0,
            "has_bad_words": 0,
            "iab_category": "",
            "is_from_recommended_pages": false,
            "is_return_visitor": false,
            "is_sitespeed": 1,
            "last_page_load": "1679789473534",
            "last_pageview_id": "2c445886-2b92-48ad-78a0-4af14a172626",
            "lt_cache_level": 0,
            "max_ads": 2,
            "metro_code": 0,
            "optimization_version": 1,
            "page_ad_positions": "",
            "page_view_count": 3,
            "page_view_id": "f37e33d6-bd2b-4510-5f30-c7a864e625ac",
            "position_selection_id": 46,
            "postal_code": "",
            "pv_event_count": 0,
            "response_size_orig": 5889,
            "response_time_orig": 468,
            "serverid": "i-04fefbe55b6f9f71a",
            "state": "DK",
            "sub_page_ad_positions": "",
            "t_epoch": 1679789475,
            "template_id": 147,
            "time_on_site_visit": 72,
            "url": "https://htmljstemplates.com/downloads?page=customNavbarBottom.html",
            "user_id": 0,
            "weather_precipitation": 0,
            "weather_summary": "",
            "weather_temperature": 0,
            "word_count": 48,
            "worst_bad_word_level": 0
        };
        var _ezim_d = {};
        var _ezat = {
            "domain_id": 350378,
            "form_factor_id": 1,
            "framework_id": 1,
            "pageview_date": "2023-03-25",
            "pageview_id": "f37e33d6-bd2b-4510-5f30-c7a864e625ac",
            "template_id": 147,
            "url": "https://htmljstemplates.com/downloads?page=customNavbarBottom.html",
            "visit_uuid": "3f422165-88f1-4faf-454f-4783b626d44f"
        };
    </script>
    <script data-ezscrex=false data-pagespeed-no-defer data-cfasync=false>
        __ez.queue.addFile('banger.js', '/porpoiseant/banger.js?cb=195-0&bv=198&v=73&PageSpeed=off', true, [], true,
            false, false, true);
    </script>
    <script data-ezscrex=false data-cfasync=false data-pagespeed-no-defer>
        ! function () {
            var e;
            __ez.vep = (e = [], {
                Add: function (i, t) {
                    __ez.dot.isDefined(i) && __ez.dot.isValid(t) && e.push({
                        type: "video",
                        video_impression_id: i,
                        domain_id: __ez.dot.getDID(),
                        t_epoch: __ez.dot.getEpoch(0),
                        data: __ez.dot.dataToStr(t)
                    })
                },
                Fire: function () {
                    if (void 0 === document.visibilityState || "prerender" !== document.visibilityState) {
                        if (__ez.dot.isDefined(e) && e.length > 0)
                            for (; e.length > 0;) {
                                var i = 5;
                                i > e.length && (i = e.length);
                                var t = e.splice(0, i),
                                    o = __ez.dot.getURL("/detroitchicago/grapefruit.gif") + "?orig=" + (!
                                        0 === __ez.template.isOrig ? 1 : 0) + "&v=" + btoa(JSON.stringify(
                                        t));
                                __ez.dot.Fire(o)
                            }
                        e = []
                    }
                }
            })
        }();
    </script>
    <script data-ezscrex=false data-cfasync=false data-pagespeed-no-defer></script>
    <meta name=viewport content="width=device-width,initial-scale=1">
    <meta charset=utf-8>
    <meta http-equiv=x-ua-compatible content="IE=edge">
    <link rel=icon href=/static_files/images/favicon.png>
    <link rel=preconnect href=https://fonts.googleapis.com>
    <link rel=preconnect href=https://fonts.gstatic.com crossorigin>
    <link href="https://fonts.googleapis.com/css2?display=optional&amp;family=Anton&amp;family=Manrope" rel=preload
        as=style onload="this.onload=null;this.rel='stylesheet'"><noscript>
        <link href="https://fonts.googleapis.com/css2?display=optional&amp;family=Anton&amp;family=Manrope"
            rel=stylesheet></noscript>
    <script src="https://htmljstemplates.com/ezossp/https/kit.fontawesome.com/dd5559ee21.js?screx=1&amp;sxcb=1a"
        crossorigin=anonymous type=text/ez-screx></script>
    <link href=https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css rel=preload
        integrity=sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3 crossorigin=anonymous as=style
        onload="this.onload=null;this.rel='stylesheet'"><noscript>
        <link href=https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css rel=stylesheet
            integrity=sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3 crossorigin=anonymous>
        </noscript>
    <style>
        .fontStyle2 {
            font-family: manrope, sans-serif
        }

        .fontStyle1 {
            font-family: anton, sans-serif
        }

        .compact {
            line-height: 1.5em
        }

        a.customNav {
            color: #fff;
            text-decoration: none;
            display: inline-block;
            min-width: 80px;
            text-align: center;
            border-right: 1px solid #e55c69;
            padding: 14px 18px
        }

        a.active,
        a.customNav:hover {
            background: rgba(255, 255, 255, .2) !important;
            border-color: transparent
        }

        @media screen and (min-width:797px) {
            #bottomNavbar.collapse {
                display: block
            }
        }

        @media screen and (max-width:796px) {
            #bottomNavbar {
                padding: 14px
            }

            #bottomNavbar a.customNav {
                display: block !important;
                border: none;
                background: rgba(0, 0, 0, .2);
                margin-top: 4px;
                margin-bottom: 4px;
                margin-left: -5px;
                margin-right: -5px
            }

            #removeFlex {
                display: block !important;
                text-align: center
            }
        }
    </style>
    <title>Navbar Bottom - Bootstrap 5</title>
    <meta name=description content="Navbar bottom designed with bootstrap 5">
    <script src="https://htmljstemplates.com/ezossp/https/code.jquery.com/jquery-3.1.1.min.js?screx=1&amp;sxcb=1a"
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin=anonymous type=text/ez-screx>
    </script>
    <script
        src="https://htmljstemplates.com/ezossp/https/cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js?screx=1&amp;sxcb=1a"
        integrity=sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p crossorigin=anonymous
        type=text/ez-screx></script>
    <style id=ezoicCSS>
        .ezoic-ad {
            display: inline-block;
            border: 0
        }

        .ezoic-ad>div>iframe {
            margin: 0 !important;
            padding: 0 !important
        }

        .ezoic-floating-bottom {
            display: none !important
        }
    </style>
    <link rel=canonical href="https://htmljstemplates.com/downloads?page=customNavbarBottom.html">
    <script>
        var ezouid = "1";
    </script>
    <base href="https://htmljstemplates.com/downloads?page=customNavbarBottom.html">
    <script>
        var ezoTemplate = 'pub_site_noads';
        if (typeof ezouid == 'undefined') {
            var ezouid = 'none';
        }
        var ezoFormfactor = '1';
        var ezo_elements_to_check = Array();
    </script>
    <script data-ezscrex=false>
        var soc_app_id = '0';
        var did = 350378;
        var ezdomain = 'htmljstemplates.com';
        var ezoicSearchable = 1;
    </script>
    <script data-ezscrex=false data-pagespeed-no-defer data-cfasync=false>
        function create_ezolpl(pvID, rv) {
            var d = new Date();
            d.setTime(d.getTime() + (365 * 24 * 60 * 60 * 1000));
            var expires = "expires=" + d.toUTCString();
            __ez.ck.setByCat("ezux_lpl_350378=" + new Date().getTime() + "|" + pvID + "|" + rv + "; " + expires, 3);
        }

        function attach_ezolpl(pvID, rv) {
            if (document.readyState === "complete") {
                create_ezolpl(pvID, rv);
            }
            if (window.attachEvent) {
                window.attachEvent("onload", create_ezolpl, pvID, rv);
            } else {
                if (window.onload) {
                    var curronload = window.onload;
                    var newonload = function (evt) {
                        curronload(evt);
                        create_ezolpl(pvID, rv);
                    };
                    window.onload = newonload;
                } else {
                    window.onload = create_ezolpl.bind(null, pvID, rv);
                }
            }
        }
        __ez.queue.addFunc("attach_ezolpl", "attach_ezolpl", ["f37e33d6-bd2b-4510-5f30-c7a864e625ac", "false"], false, [
            '/detroitchicago/boise.js'
        ], true, false, false, false);
    </script>
    <script>
        var _audins_dom = "htmljstemplates_com",
            _audins_did = 350378;
        __ez.queue.addFile('/detroitchicago/cmbv2.js',
            '/detroitchicago/cmbv2.js?gcb=195-0&cb=04-3y02-8y06-13y07-2y1d-7y0b-6y0d-23y17-4y1b-5y20-4y21-1y22-2y24-2y23-5y25-3y26-4y33-4y5f-2&cmbcb=130&sj=x04x02x06x07x1dx0bx0dx17x1bx20x21x22x24x23x25x26x33x5f&abt=ReallyShortBidderTimeout',
            true, [], true, false, true, false);
    </script>
    <script defer>
        __ez.queue.addFile('/detroitchicago/cmbdv2.js',
            '/detroitchicago/cmbdv2.js?gcb=195-0&cb=03-8y0c-6y1c-5&cmbcb=130&sj=x03x0cx1c&abt=ReallyShortBidderTimeout',
            true, ['/detroitchicago/cmbv2.js'], true, false, true, false);
    </script>
</head>
<body>
    <div class=bg-light>
        <div class=container-fluid>


           <div class="d-flex justify-content-between align-items-center">
               <div class=p-2><a class=navbar-brand href=#><img
               src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20width=%22204%22%20height=%22152%22%3E%3C/svg%3E"
                            height=90 alt ezimgfmt="rs rscb1 src ng ngcb1" class=ezlazyload
                            data-ezsrc=https://htmljstemplates.com/static_files/images/logos/logo_5.png></a></div>
                <div class="p-2 text-end">
                    <div class="d-inline-block mx-3 compact align-middle"><span class="fs-3 fontStyle1">Call Us
                            Today</span><br><span class="fs-5 fontStyle2">1-800-324-1234</span></div>
            @auth
                    <div class="d-inline-block mx-3 d-none d-lg-inline-block d-md-inline-block d-sm-inline-block">
                        <button class="btn btn-outline-danger pt-2 px-4 compact">
                            <span class="fontStyle1 fs-3"><i class="fas fa-pen-alt"></i>FREE</span><br>ESTIMATE</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-danger fontStyle2"><button type=button data-bs-toggle=collapse data-bs-target=#bottomNavbar
            class="btn btn-danger w-100 d-lg-none d-md-none d-sm-block d-xs-block rounded-0 p-2"><i
                class="fas fa-bars me-2"></i> Menu</button>
        <div class="collapse navbar-collapse px-2" id=bottomNavbar>
            <div class=container-fluid>
                <div class="d-flex justify-content-between align-items-center" id=removeFlex>
                    <div class=flex-grow-1><a href=# class="active d-inline-block customNav">Home</a>
                        <a href=# class="d-inline-block customNav">Services</a>
                        <a href=# class="d-inline-block customNav">Pricing</a>
                        <a href=# class="d-inline-block customNav">About Us</a>
                        <a href=# class="d-inline-block customNav">Partners</a>
                        <a href=# class="d-inline-block customNav">Blog</a>
                        <a href=# class="d-inline-block customNav">Contact Us</a></div>
                        <div class=m-3><i class="fas fa-search text-white fs-6"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class=container>
        <div class="row align-items-center">
            @endauth



                @yield('content')
            </div>
        </div>


    <div class="p-4 text-center" style=background:#000>
        <h2 class="fontStyle1 my-5 text-white">Ready to monetize your website?</h2><span
            class="ezoic-autoinsert-video ezoic-under_first_paragraph"></span>

    </div>
    <script data-ezscrex=false data-cfasync=false data-pagespeed-no-defer>
        try {
            var __ezlcp;
            const fd = window._ezfd || {}
            fd.measure = fd.measure || function (cb) {
                cb()
            }

            function __ezlcpcd() {
                fd.measure(function () {
                    const po = new PerformanceObserver((entryList) => {
                        const entries = entryList.getEntries();
                        const lcpElement = entries[entries.length - 1];
                        var vh = window.innerHeight || Math.max(document.documentElement.clientHeight,
                            document.body.clientHeight);
                        var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                        if (lcpElement.element.getBoundingClientRect().top + scrollTop < vh) {
                            if (lcpElement != undefined && lcpElement.element.parentElement !=
                                undefined && lcpElement.element.parentElement.id == "ez-cookie-template"
                                ) {
                                return;
                            }
                            __ezlcp = lcpElement;
                        }
                    });
                    po.observe({
                        type: 'largest-contentful-paint',
                        buffered: true
                    });
                });
            };
            __ezlcpcd();

            function __ez_sendLCPElement() {
                fd.measure(function () {
                    if (window.__ezlcp && typeof window.__ezlcp.element != 'undefined' && window._ezaq &&
                        typeof window._ezaq.domain_id != 'undefined') {
                        var vh = window.innerHeight || Math.max(document.documentElement.clientHeight, document
                            .body.clientHeight);
                        var json = {
                            url: document.URL,
                            formfactor: window.ezoFormfactor,
                            domainid: window._ezaq.domain_id,
                            element: __ezlcp.element.outerHTML,
                            viewht: vh,
                        };
                        var url = "/cheetah/lcpel.go";
                        if ((typeof window.ezJsu !== "undefined" && window.ezJsu === true) || (typeof window
                                ._ez_sa !== "undefined" && window._ez_sa === true) || ((typeof window.isAmp !=
                                'undefined') && window.isAmp === true) || ((typeof window.ezWp !==
                                'undefined') && window.ezWp === true) || ((typeof window
                                    ._ez_send_requests_through_ezoic !== 'undefined') && window
                                ._ez_send_requests_through_ezoic === true)) {
                            url = "//g.ezoic.net" + url;
                        }
                        var xhr = new XMLHttpRequest();
                        xhr.open("POST", url, true);
                        xhr.setRequestHeader('Content-Type', 'text/plain');
                        xhr.send(JSON.stringify(json));
                    } else {
                        setTimeout(__ez_sendLCPElement, 4000);
                    }
                });
            }
            if (window.addEventListener) {
                window.addEventListener('load', function () {
                    setTimeout(__ez_sendLCPElement, 2000);
                }, false);
            }
        } catch (e) {}
    </script>
    <script data-ezscrex=false data-cfasync=false data-pagespeed-no-defer>
        __ez.surgeonuri = "/cheetah/SeCSS.go";
    </script>
    <script>
        var __inScopeForCCPA = false;

        function __uspapi(command, version, callback) {
            var response = null;
            var successs = false;
            if (command === "getUSPData" && version === 1) {
                var uspString = "1";
                if (__inScopeForCCPA) {
                    uspString += "Y";
                    var result;
                    var consentCookie = (result = new RegExp('(?:^|; )ezoccpaconsent=([^;]*)').exec(document.cookie)) ?
                        (result[1]) : null;
                    if (consentCookie === "nonconsent") {
                        uspString += "Y";
                    } else {
                        uspString += "N";
                    }
                    uspString += "N"
                } else {
                    uspString += "---";
                }
                response = {
                    uspString: uspString,
                    version: 1
                };
                success = true;
            }
            return callback(response, success);
        };

        function __receiveUspapiMessage(event) {
            if (event.data.hasOwnProperty('__uspapiCall')) {
                __uspapi('getUSPData', 1, function (uspData, success) {
                    event.source.postMessage({
                        __uspapiReturn: {
                            returnValue: uspData,
                            success: success,
                            callId: event.data.__uspapiCall.callId
                        }
                    }, event.origin);
                });
            }
            return null;
        };
        window.addEventListener("message", __receiveUspapiMessage, false);
    </script>
    <script data-cfasync=false>
        ! function () {
            var e = function (e, t) {
                for (var r = 0; r < t.length; r++) {
                    var n = t[r];
                    if (0 == n.complete || void 0 !== n.readyState && n.readyState < 4) {
                        var o = n.getAttribute("src") || n.currentSrc;
                        void 0 !== n.readyState && 0 == n.readyState ? n.addEventListener("loadstart", (function (
                            e) {
                                var t = e.currentTarget.getAttribute("src") || e.currentSrc;
                                window.ezorqs(e, t)
                            })) : (o = n.getAttribute("src") || n.currentSrc, window.ezorqs(n, o)), n
                            .addEventListener("load", (function (e) {
                                var t = e.currentTarget.getAttribute("src") || e.srcElement.currentSrc;
                                window.ezorqe(e, t)
                            })), n.addEventListener("loadeddata", (function (e) {
                                var t = e.currentTarget.getAttribute("src") || e.srcElement.currentSrc;
                                window.ezorqe(e, t)
                            })), n.addEventListener("error", (function (e) {
                                var t = e.currentTarget.getAttribute("src") || e.srcElement.currentSrc;
                                window.ezorqe(e, t)
                            }))
                    }
                }
            };

            function t(e) {
                for (var t = 0; t < document.styleSheets.length; t++)
                    if (document.styleSheets[t].href == e) return !0;
                return !1
            }
            __ez_addAllListeners = function () {
                e(0, document.querySelectorAll("img")), e(0, document.querySelectorAll("video")), e(0, document
                        .querySelectorAll("audio")),
                    function (e) {
                        for (var r = 0; r < e.length; r++) {
                            var n = e[r];
                            if (("preload" == n.getAttribute("rel") || "stylesheet" == n.getAttribute("rel")) &&
                                null != n.getAttribute("href") && t(n.getAttribute("href"))) {
                                window.ezorqs(n, n.getAttribute("href"));
                                var o = document.createElement("img");
                                o.onerror = function (e) {
                                    void 0 !== e.path && void 0 !== e.path[0].currentSrc ? window.ezorqe(n, e
                                            .path[0].currentSrc) : void 0 !== e.srcElement && void 0 !== e
                                        .srcElement.href && window.ezorqe(n, e.srcElement.href)
                                }, o.src = n.getAttribute("href")
                            }
                        }
                    }(document.querySelectorAll("link")), void 0 !== window.__ez.ssaf && window.__ez.ssaf.indexOf(
                        16) > -1 && void 0 !== window.__ez.sshsdef && !1 === window.__ez.sshsdef && Element
                    .prototype.addEventListener && ("function" == typeof window.onload && (window.addEventListener(
                        "load", window.onload), window.onload = null), "function" == typeof document.onload && (
                        document.addEventListener.addEventListener("load", document.onload), document.onload =
                        null))
            }, __ez.queue.addFunc("__ez_addAllListeners", "__ez_addAllListeners", null, !1, [
                "/detroitchicago/tulsa.js"
            ], !0, !0, !0, !0)
        }();
    </script>
    <script style=display:none>
        var __ez_dims = (function () {
            var setCookie = function (name, content, expiry) {
                return document.cookie = name + '=' + content + ((expiry) ? ';expires=' + (new Date(Math
                    .floor(new Date().getTime() + expiry * 1000)).toUTCString()) : '') + ';path=/';
            };
            var ffid = 1;
            var oh = window.screen.height;
            var ow = window.screen.width;
            var h = ffid === 1 ? oh : (oh > ow) ? oh : ow;
            var w = ffid === 1 ? ow : (oh > ow) ? ow : oh;
            var uh = window.innerHeight || document.documentElement.clientHeight || document
                .getElementsByTagName('body')[0].clientHeight;
            var uw = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName(
                'body')[0].clientWidth;
            setCookie('ezds', encodeURIComponent('ffid=' + ffid + ',w=' + w + ',h=' + h), (31536e3 * 7));
            setCookie('ezohw', encodeURIComponent('w=' + uw + ',h=' + uh), (31536e3 * 7));
        })();
    </script>
    <script style=display:none async></script>
</body>

</html>
