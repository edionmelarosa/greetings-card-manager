import Vue from 'vue';

String.prototype.capitalize = function() {
    return this.charAt(0).toUpperCase() + this.slice(1);
}

window.error_processing_message = () => {
    return 'Error processing request, please try refreshing your browser. If error still persist, contact administrator.';
}

window.notify_success = (text, title='Success') => {
    Vue.notify({
        group: 'app',
        title: title,
        text: text,
        type: 'success',
        position: 'top right'
    });
}

window.notify_error = (text, title='Error') => {
    Vue.notify({
        group: 'app',
        title: title,
        text: text,
        type: 'error',
        position: 'top right'
    });
}