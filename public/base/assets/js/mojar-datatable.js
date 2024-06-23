class mojarTable {

    constructor(e) {
        this.url = e.url;
        this.action_url = e.action_url;
        this.remove_url = e.remove_url || null;
        this.status_url = e.status_url || null;
        this.remove_question = (e.remove_question) ? e.remove_question : juzaweb.lang.remove_question.replace(':name', juzaweb.lang.the_selected_items);
        this.detete_button = (e.detete_button) ? e.detete_button : "#delete-item";
        this.status_button = (e.status_button) ? e.status_button : ".status-button";
        this.apply_button = (e.apply_button) ? e.apply_button : "#apply-action";
        this.table = (e.table) ? e.table : '.mojarTable';
        this.field_id = (e.field_id) ? e.field_id : 'id';
        this.form_search = (e.form_search) ? e.form_search : "#form-search";
        this.sort_name = (e.sort_name) ? e.sort_name : 'id';
        this.sort_order = (e.sort_order) ? e.sort_order : 'desc';
        this.page_size = (e.page_size) ? e.page_size : 10;
        this.search = (e.search) ? e.search : false;
        this.method = (e.method) ? e.method : 'get';
        this.locale = (e.locale) ? e.locale : 'en-US';
        this.chunk_action = (e.chunk_action) ? e.chunk_action : false;
        this.inputRow = "";
        this.init();
    }

    init() {

    }


}