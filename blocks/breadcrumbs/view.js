/*
 * This script is enqueued by the server-side render function in `view.php`. This script will run when
 * this block appears on a page.
 */
(function () {
    const options = {
        widget: 'breadcrumbs',
        target: 'monsta_breadcrumbs',
    };

    if (monsta.config.affiliateId) {
        options.affiliateId = monsta.config.affiliateId;
    } else {
        options.businessId = monsta.config.businessId;
    }

    setTimeout(() => {
        console.warn('Monsta Breadcrumbs does not currently work as a widget because it relies on React Router.');
        return;
        if (typeof widgets === 'function') {
            widgets(options);
        } else {
            console.log('typeof widgets = ' + typeof widgets);
        }
    }, 1000);
})();
