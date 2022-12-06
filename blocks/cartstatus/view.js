/*
 * This script is enqueued by the server-side render function in `view.php`. This script will run when
 * this block appears on a page.
 */
(function () {
    const options = {
        widget: 'cartstatus',
        target: 'monsta_cartstatus',
        checkout: '/checkout'
    };

    if (monsta.config.affiliateId) {
        options.affiliateId = monsta.config.affiliateId;
    } else {
        options.businessId = monsta.config.businessId;
    }

    setTimeout(() => {
        if (typeof widgets === 'function') {
            widgets(options);
        } else {
            console.log('typeof widgets = ' + typeof widgets);
        }
    }, 1000);
})();
