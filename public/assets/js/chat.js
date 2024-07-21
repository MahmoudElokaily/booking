    jQuery(document).ready(function() {
            scrollToBottom();
            $(".chat-list a").click(function() {
                $(".chatbox").addClass('showbox');
                return false;
            });

            $(".chat-icon").click(function() {
            console.log("test");
                $(".chatbox").removeClass('showbox');
            });

            $(".send-button").click(function (){
                $(".text-to-send").val('');
                scrollToBottom();
            });

        function scrollToBottom() {
            var chatBody = $('.msg-body');
            chatBody.scrollTop(chatBody.prop("scrollHeight"));
        }
    });
