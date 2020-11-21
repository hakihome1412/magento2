// define(['ko'], function(ko) {
//     return function(config) {
//         this.message1 = ko.observable(config.exampleMessage1);
//         this.message2 = ko.observable(config.exampleMessage2);
//     }
// });

/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
/*jshint browser:true jquery:true*/
/*global alert*/
define([
        "jquery",
        'ko',
        'uiComponent',
    ], function ($, ko, Component) {
        "use strict";
        return Component.extend({
            defaults: {
                msgSaved: false,
                template: 'Smart_Feedback/feedback',
            },
            /** Initialize observable properties */
            initObservable: function () {
                this._super();
                this.importfile = ko.observable();
                this.commentTextArea = ko.observable('');
                return this;
            },
            submitImport: function (formElement,event) {
                event.stopPropagation();
                console.log("hello");
                var data = {
                    'file' : this.importfile()
                }
                console.log(data);
                // $.ajax({
                //     url: this.getFeedbackUrl,
                //     data: data,
                //     type: 'post',
                //     dataType: 'json',
                //     context: this,
                //     beforeSend: this._ajaxBeforeSend,
                //     success: function (response) {
                //         this.msgSaved(true);
                //         alert({
                //             content: $.mage.__('Thanks for Submitting.')
                //         });
                //     },
                //     complete: this._ajaxComplete
                // });
            },
            submitComment : function(formElement, event) {
                event.stopPropagation();
                var data = {
                    'comment' : this.commentTextArea()
                }

                $.ajax({
                    type: "POST",
                    url: "http://magento.local/admin/helloworld/import/check",
                    data: data,
                    dataType: "json",
                    contentType : "application/json",
                    success: function(res){
                        console.log(res);
                    }
                });
            }
        });
    }
);
