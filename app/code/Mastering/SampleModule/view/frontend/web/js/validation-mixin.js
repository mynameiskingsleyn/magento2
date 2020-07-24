define(['mage/utils/wrapper'],function (wrapper) {
    'use strict';

    var extension = {
        isValid: function () {
            return true;
        }
    };

    return function (target) {
        return target.extend(extension);
        //return wrapper.wrap(target.)
    };
});