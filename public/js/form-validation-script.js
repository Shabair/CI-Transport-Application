// var Script = function () {

//     $.validator.setDefaults({
//         submitHandler: function() { alert("submitted!"); }
//     });

//     $().ready(function() {
//         // validate the comment form when it is submitted
//         $("#commentForm").validate();

//         // validate signup form on keyup and submit
//         $("#signupForm").validate({
//             rules: {
//                 first_name: "required",
//                 last_name: "required",
//                 username: {
//                     required: true,
//                     minlength: 2
//                 },
//                 password: {
//                     required: true,
//                     minlength: 5
//                 },
//                 confirm_password: {
//                     required: true,
//                     minlength: 5,
//                     equalTo: "#password"
//                 },
//                 email: {
//                     required: true,
//                     email: true
//                 },
//                 topic: {
//                     required: "#newsletter:checked",
//                     minlength: 2
//                 },
//                 agree: "required"
//             },
//             messages: {
//                 first_name: "Please enter your first_name",
//                 last_name: "Please enter your last_name",
//                 username: {
//                     required: "Please enter a username",
//                     minlength: "Your username must consist of at least 2 characters"
//                 },
//                 password: {
//                     required: "Please provide a password",
//                     minlength: "Your password must be at least 5 characters long"
//                 },
//                 confirm_password: {
//                     required: "Please provide a password",
//                     minlength: "Your password must be at least 5 characters long",
//                     equalTo: "Please enter the same password as above"
//                 },
//                 email: "Please enter a valid email address",
//                 agree: "Please accept our policy"
//             }
//         });

//         // propose username by combining first- and last_name
//         $("#username").focus(function() {
//             var first_name = $("#first_name").val();
//             var last_name = $("#last_name").val();
//             if(first_name && last_name && !this.value) {
//                 this.value = first_name + "." + last_name;
//             }
//         });

//         //code to hide topic selection, disable for demo
//         var newsletter = $("#newsletter");
//         // newsletter topics are optional, hide at first
//         var inital = newsletter.is(":checked");
//         var topics = $("#newsletter_topics")[inital ? "removeClass" : "addClass"]("gray");
//         var topicInputs = topics.find("input").attr("disabled", !inital);
//         // show when newsletter is checked
//         newsletter.click(function() {
//             topics[this.checked ? "removeClass" : "addClass"]("gray");
//             topicInputs.attr("disabled", !this.checked);
//         });
//     });


// }();