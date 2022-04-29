let googleAdsproperty = 'AW-454891487';
let googleAnalyticsProperty = 'UA-186215996-1';
let cookieConversion = 'y0dPCIGfnOYCEN-v9NgB';

document.addEventListener('DOMContentLoaded', cargar());
function cargar() {
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('set', 'allow_ad_personalization_signals', true); //Recopilación de datos de Remarketing
    gtag('js', new Date());
    gtag('config', googleAnalyticsProperty);//Configuration propiedad Google Analytics
    gtag('config', googleAdsproperty); //Configuration propiedad Google Ads
    gtag('config', googleAdsproperty, { 'send_page_view': true }); //Agregar visitantes del sitio web a listas de Remarketing 
    gtag('config', 'AW-454891487', { 'conversion_linker': true }); //establezca cookies propias en el dominio de su sitio
    //gtag('event', 'conversion', { 'send_to': `${googleAdsproperty}/${cookieConversion}` }); //Event snippet for Página vista por alumnos conversion page


    //Facebook Pixel Codes

    ! function (f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function () {
            n.callMethod ?
                n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
    }(window, document, 'script', 'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '910687336437946');
    fbq('track', 'PageView');
}