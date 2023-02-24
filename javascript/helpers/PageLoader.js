
class PageLoader{
    constructor() {}

    /**
     * remove the page loader
     * @return {void}
     */
    remove() {
        $('.loader-wrapper').fadeOut('fast', function() {
            $(this).remove();
        });
    }
}

export default new PageLoader()