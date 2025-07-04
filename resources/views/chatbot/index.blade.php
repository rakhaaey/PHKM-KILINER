@extends('layouts.app')

@section('content')
    <section class="py-16 bg-gradient-to-br from-soft-orange to-white">
        <div class="container mx-auto px-6 md:px-8">
            <h1 class="text-5xl font-extrabold text-dark-gray text-center mb-12 font-heading leading-tight">Asisten Kuliner PHCM</h1>

            <div class="max-w-xl mx-auto bg-white rounded-2xl shadow-xl overflow-hidden flex flex-col h-[70vh] border border-gray-100">
                <div id="chat-messages" class="flex-1 p-6 overflow-y-auto space-y-4 bg-light-gray">
                    <div class="flex items-start">
                        <img src="{{ asset('icons/chatbot.png') }}" alt="Bot Avatar" class="w-10 h-10 rounded-full mr-3 border border-secondary">
                        <div class="bg-secondary text-white p-4 rounded-lg max-w-[80%] shadow-md">
                            <p>Halo! Saya Asisten Kuliner PHCM. Saya bisa membantu Anda mencari resep, informasi gizi, atau tips memasak. Bagaimana saya bisa membantu Anda hari ini?</p>
                        </div>
                    </div>
                </div>

                <div class="p-6 border-t border-gray-200 bg-white">
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <button class="prompt-button bg-gray-200 text-dark-gray px-4 py-2 rounded-full hover:bg-gray-300 transition duration-200 text-sm" data-prompt="Apa resep masakan untuk diet?">Resep Diet?</button>
                        <button class="prompt-button bg-gray-200 text-dark-gray px-4 py-2 rounded-full hover:bg-gray-300 transition duration-200 text-sm" data-prompt="Bagaimana cara menghitung kalori makanan?">Cara Hitung Kalori?</button>
                        <button class="prompt-button bg-gray-200 text-dark-gray px-4 py-2 rounded-full hover:bg-gray-300 transition duration-200 text-sm" data-prompt="Tips menyimpan sayuran agar awet?">Tips Simpan Sayuran?</button>
                        <button class="prompt-button bg-gray-200 text-dark-gray px-4 py-2 rounded-full hover:bg-gray-300 transition duration-200 text-sm" data-prompt="Ide menu sarapan cepat dan sehat?">Menu Sarapan Cepat?</button>
                    </div>
                    <div class="flex">
                        <input type="text" id="chat-input" placeholder="Ketik pesan Anda..." class="flex-1 p-4 border border-gray-300 rounded-l-full focus:outline-none focus:ring-2 focus:ring-primary text-lg">
                        <button id="send-chat-button" class="bg-primary text-white px-6 rounded-r-full font-semibold hover:bg-red-600 transition duration-300 shadow-md">Kirim</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const chatMessages = document.getElementById('chat-messages');
            const chatInput = document.getElementById('chat-input');
            const sendChatButton = document.getElementById('send-chat-button');
            const promptButtons = document.querySelectorAll('.prompt-button');

            function appendMessage(sender, message) {
                const messageDiv = document.createElement('div');
                messageDiv.classList.add('flex', 'items-start');

                if (sender === 'user') {
                    messageDiv.classList.add('justify-end');
                    messageDiv.innerHTML = `
                        <div class="bg-primary text-white p-4 rounded-lg max-w-[80%] shadow-md">
                            <p>${message}</p>
                        </div>
                    `;
                } else { // bot
                    messageDiv.innerHTML = `
                        <img src="{{ asset('icons/chatbot.png') }}" alt="Bot Avatar" class="w-10 h-10 rounded-full mr-3 border border-secondary">
                        <div class="bg-secondary text-white p-4 rounded-lg max-w-[80%] shadow-md">
                            <p>${message}</p>
                        </div>
                    `;
                }
                chatMessages.appendChild(messageDiv);
                chatMessages.scrollTop = chatMessages.scrollHeight;
            }

            async function getBotResponse(userMessage) {
                const lowerMessage = userMessage.toLowerCase();
                if (lowerMessage.includes('resep diet')) {
                    return "Tentu! Saya punya beberapa ide resep diet sehat: Salad Ayam Alpukat, Tumis Brokoli Udang, atau Sup Krim Jagung Manis. Mana yang ingin Anda tahu lebih detail?";
                } else if (lowerMessage.includes('hitung kalori')) {
                    return "Anda bisa menggunakan 'Kalkulator Gizi' kami untuk menghitung perkiraan kalori dari makanan yang Anda konsumsi.";
                } else if (lowerMessage.includes('simpan sayuran')) {
                    return "Untuk menyimpan sayuran agar awet, Anda bisa mencuci bersih, keringkan, lalu bungkus dengan tisu dapur sebelum disimpan di wadah kedap udara di kulkas.";
                } else if (lowerMessage.includes('sarapan cepat')) {
                    return "Ide sarapan cepat dan sehat: Oatmeal buah berry, atau telur rebus dengan roti gandum. Keduanya tinggi serat dan protein!";
                } else if (lowerMessage.includes('terima kasih') || lowerMessage.includes('makasih')) {
                    return "Sama-sama! Senang bisa membantu.";
                } else if (lowerMessage.includes('halo') || lowerMessage.includes('hai')) {
                    return "Halo kembali! Ada yang bisa saya bantu terkait kuliner sehat?";
                } else if (lowerMessage.includes('siapa kamu')) {
                    return "Saya Asisten Kuliner PHCM, dirancang untuk membantu Anda dengan informasi resep, gizi, dan tips memasak sehat!";
                } else {
                    return "Maaf, saya belum mengerti. Bisakah Anda bertanya tentang resep, gizi, atau tips memasak? Contoh: 'Resep sup ayam', 'Berapa kalori nasi?', 'Cara memilih buah segar?'.";
                }
            }

            async function sendMessage() {
                const message = chatInput.value.trim();
                if (message === '') return;

                appendMessage('user', message);
                chatInput.value = '';

                const typingIndicator = document.createElement('div');
                typingIndicator.classList.add('flex', 'items-start');
                typingIndicator.innerHTML = `
                    <img src="{{ asset('icons/chatbot.png') }}" alt="Bot Avatar" class="w-10 h-10 rounded-full mr-3 border border-secondary">
                    <div class="bg-secondary text-white p-4 rounded-lg max-w-[80%] shadow-md">
                        <p>...</p>
                    </div>
                `;
                chatMessages.appendChild(typingIndicator);
                chatMessages.scrollTop = chatMessages.scrollHeight;

                setTimeout(async () => { // Simulate network delay
                    const botReply = await getBotResponse(message);
                    chatMessages.removeChild(typingIndicator);
                    appendMessage('bot', botReply);
                }, 1000); // 1 second delay
            }

            sendChatButton.addEventListener('click', sendMessage);
            chatInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    sendMessage();
                }
            });

            promptButtons.forEach(button => {
                button.addEventListener('click', function() {
                    chatInput.value = this.dataset.prompt;
                    sendMessage();
                });
            });
        });
    </script>
@endsection