class FaturTable {

    // Constructor
    constructor(selector, isServerSide = false) {
        this.selector = selector;
        this.isServerSide = isServerSide;

        // Return
        return this.generate();
    }

    // Generate DataTable
    generate() {
        if(typeof $(this.selector).DataTable === "function") {
            // If not server side
            if(this.isServerSide == false) {
                var table = $(this.selector).DataTable({
                    columnDefs: [
                        $(this.selector).find(".td-checkbox").length > 0 ? {orderable: false, targets: 0} : {},
                        $(this.selector).find(".td-options").length > 0 ? {orderable: false, targets: -1} : {},
                    ],
                    order: []
                });
            }

            // Return
            return table;
        }
        else {
            console.log('No DataTable found.');
            return;
        }
    }
}