<div id="chat-box">
    <h4>Hỗ trợ khách hàng</h4>
    <div class="chat">
        <div id="messages"></div>
        <br>
        <input type="text" id="message-input" placeholder="Nhập tin nhắn...">
        <button onclick="sendMessage()">Gửi</button>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
function sendMessage() {
    let message = $('#message-input').val();
    if (message.trim() === '') return;

    $.ajax({
        url: "{{ route('messages.send') }}", // Sử dụng Laravel route
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        data: {
            receiver_id: 11,  // Thay bằng ID người nhận thực tế
            message: message
        },
        success: function(response) {
            if (response.success) {
                $('#messages').append(`<p><strong>Bạn:</strong> ${message}</p>`);
                $('#message-input').val('');
                $('#messages').scrollTop($('#messages')[0].scrollHeight);
            }
        },
        error: function(xhr) {
            console.error(xhr.responseText);
        }
    });
}

// Hàm tải tin nhắn mới
function loadMessages() {
    $.ajax({
        url: "{{ route('messages.get') }}", // Thêm route để lấy tin nhắn
        method: "GET",
        success: function(response) {
            $('#messages').html(''); // Xóa nội dung cũ
            response.messages.forEach(msg => {
                let sender = msg.sender_id === 11 ? "Khách hàng" : "Bạn";
                $('#messages').append(`<p><strong>${sender}:</strong> ${msg.message}</p>`);
            });
            $('#messages').scrollTop($('#messages')[0].scrollHeight);
        },
        error: function(xhr) {
            console.error(xhr.responseText);
        }
    });
}

// Cập nhật tin nhắn mỗi 3 giây
setInterval(loadMessages, 300000);

// Gọi ngay khi trang load
$(document).ready(function() {
    loadMessages();
});
</script>
