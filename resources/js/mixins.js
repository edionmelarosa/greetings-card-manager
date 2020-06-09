import Vue from 'vue';
import _has from 'lodash/has';

export default Vue.mixin({
     methods: {
        isInvalid(field) {
            if (!_has(this.error.errors, field)) {
                return false;
            }

            return true;
        },

        invalidFeedback(field) {
            if (_has(this.error.errors, field)) {
                return this.error.errors[field][0];
            }

            return null;
        }
    }
})