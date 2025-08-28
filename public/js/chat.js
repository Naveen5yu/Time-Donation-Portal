document.addEventListener("DOMContentLoaded", function () {
    const chatForm = document.getElementById("chat-form");
    const chatInput = document.getElementById("chat-input");
    const chatBox = document.getElementById("chat-box");

    // Scroll to bottom helper
    function scrollToBottom() {
        chatBox.scrollTop = chatBox.scrollHeight;
    }

    // Send message
    chatForm.addEventListener("submit", function (e) {
        e.preventDefault();
        const message = chatInput.value.trim();
        if (!message) return;

        fetch(chatForm.action, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({ message })
        })
        .then(res => res.json())
        .then(data => {
            chatInput.value = "";
            appendMessage(data, true);
        })
        .catch(console.error);
    });

    // Append message to chat box
    function appendMessage(data, isOwn = false) {
        const div = document.createElement("div");
        div.classList.add("chat-message", isOwn ? "own" : "other");
        div.innerHTML = `<p>${data.message}</p><small>${data.time}</small>`;
        chatBox.appendChild(div);
        scrollToBottom();
    }

    // Poll for new messages every 2s
    setInterval(() => {
        fetch(chatBox.dataset.fetchUrl)
            .then(res => res.json())
            .then(messages => {
                chatBox.innerHTML = "";
                messages.forEach(msg => appendMessage(msg, msg.is_own));
            });
    }, 2000);

    scrollToBottom();
});
