@extends('pages.layout.app')
@section('content')

<main>
            <!-- Hero Section with Animated Background -->
    <div class="relative py-16 md:py-24 overflow-hidden">
        <!-- Background Elements -->
        <div class="absolute inset-0 bg-[#0A0714] z-0"></div>
        <div class="absolute top-0 right-0 w-96 h-96 bg-[#00FF99]/10 rounded-full filter blur-3xl z-0"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-purple-600/10 rounded-full filter blur-3xl z-0"></div>
        
        <!-- Animated particles -->
        <div class="absolute inset-0 z-0 opacity-30">
            <div class="particle absolute w-2 h-2 rounded-full bg-[#00FF99]/50" style="top: 20%; left: 10%; animation: float 8s ease-in-out infinite;"></div>
            <div class="particle absolute w-3 h-3 rounded-full bg-[#00FF99]/30" style="top: 60%; left: 15%; animation: float 12s ease-in-out infinite;"></div>
            <div class="particle absolute w-2 h-2 rounded-full bg-[#00FF99]/40" style="top: 30%; left: 85%; animation: float 10s ease-in-out infinite;"></div>
            <div class="particle absolute w-4 h-4 rounded-full bg-[#00FF99]/20" style="top: 70%; left: 80%; animation: float 14s ease-in-out infinite;"></div>
            <div class="particle absolute w-2 h-2 rounded-full bg-[#00FF99]/60" style="top: 40%; left: 50%; animation: float 9s ease-in-out infinite;"></div>
        </div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center mb-8">
                <div class="inline-block mb-4 px-6 py-2 bg-[#00FF99]/10 rounded-full border border-[#00FF99]/20">
                    <span class="text-[#00FF99] font-medium">We're Here For You</span>
                </div>
                <h1 class="text-4xl md:text-6xl font-bold mb-6 leading-tight">Get In <span class="text-[#00FF99]">Touch</span></h1>
                <p class="text-xl text-gray-300 max-w-3xl mx-auto leading-relaxed">
                    Have questions or need assistance? Our team is available 24/7 to help you with any inquiries.
                </p>
            </div>
            
            <!-- Contact Methods Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-5xl mx-auto">
                <div class="bg-[#1A1428]/80 backdrop-blur-sm p-6 rounded-xl border border-[#00FF99]/10 hover:border-[#00FF99]/30 transition-all hover:transform hover:-translate-y-1 hover:shadow-lg hover:shadow-[#00FF99]/5 text-center">
                    <div class="w-16 h-16 rounded-full bg-[#00FF99]/10 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-headset text-[#00FF99] text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Live Support</h3>
                    <p class="text-gray-300 mb-4">Get instant help from our support team via live chat</p>
                    <button type="button" class="px-4 py-2 bg-[#00FF99]/10 text-[#00FF99] rounded-lg border border-[#00FF99]/30 hover:bg-[#00FF99]/20 transition-colors">
                        Start Chat
                    </button>
                </div>
                
                <div class="bg-[#1A1428]/80 backdrop-blur-sm p-6 rounded-xl border border-[#00FF99]/10 hover:border-[#00FF99]/30 transition-all hover:transform hover:-translate-y-1 hover:shadow-lg hover:shadow-[#00FF99]/5 text-center">
                    <div class="w-16 h-16 rounded-full bg-[#00FF99]/10 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-envelope text-[#00FF99] text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Email Us</h3>
                    <p class="text-gray-300 mb-4">Send us an email and we'll respond within 24 hours</p>
                    <a href="mailto:info@{{ config('app.name') }}.com" class="px-4 py-2 bg-[#00FF99]/10 text-[#00FF99] rounded-lg border border-[#00FF99]/30 hover:bg-[#00FF99]/20 transition-colors inline-block">
                        Send Email
                    </a>
                </div>
                
                <div class="bg-[#1A1428]/80 backdrop-blur-sm p-6 rounded-xl border border-[#00FF99]/10 hover:border-[#00FF99]/30 transition-all hover:transform hover:-translate-y-1 hover:shadow-lg hover:shadow-[#00FF99]/5 text-center">
                    <div class="w-16 h-16 rounded-full bg-[#00FF99]/10 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-ticket-alt text-[#00FF99] text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Submit Ticket</h3>
                    <p class="text-gray-300 mb-4">Create a support ticket for technical issues</p>
                    <a href="{{ route('login') }}" class="px-4 py-2 bg-[#00FF99]/10 text-[#00FF99] rounded-lg border border-[#00FF99]/30 hover:bg-[#00FF99]/20 transition-colors inline-block">
                        Open Ticket
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Form and Info Section -->
    <div class="py-16 bg-gradient-to-b from-[#0A0714] to-[#0D091C]">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
                <!-- Contact Form -->
                <div class="bg-gradient-to-br from-[#1A1428] to-[#0F0A1F] rounded-2xl p-8 border border-[#00FF99]/10 shadow-xl relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-40 h-40 bg-[#00FF99]/5 rounded-full blur-3xl -mr-20 -mt-20"></div>
                    
                    <div class="relative z-10">
                        <h2 class="text-2xl font-bold mb-6 flex items-center">
                            <i class="fas fa-paper-plane text-[#00FF99] mr-3"></i>
                            Send Us a <span class="text-[#00FF99] ml-1">Message</span>
                        </h2>
                        
                        <form action="#" method="GET" class="space-y-6">
                            <input type="hidden" name="_token" value="QHTgDfeSDEhGixs61ktyfaAnqYfyNU0Xv8qcvRbs" autocomplete="off">                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="name" class="block mb-2 text-sm font-medium">Your Name</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <i class="fas fa-user text-gray-400"></i>
                                        </div>
                                        <input type="text" id="name" name="name" class="w-full bg-[#0F0A1F] border border-gray-700 rounded-lg pl-10 p-3 text-white focus:outline-none focus:border-[#00FF99] transition-colors" placeholder="John Doe" required="">
                                    </div>
                                </div>
                                
                                <div>
                                    <label for="email" class="block mb-2 text-sm font-medium">Email Address</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <i class="fas fa-envelope text-gray-400"></i>
                                        </div>
                                        <input type="email" id="email" name="email" class="w-full bg-[#0F0A1F] border border-gray-700 rounded-lg pl-10 p-3 text-white focus:outline-none focus:border-[#00FF99] transition-colors" placeholder="your@email.com" required="">
                                    </div>
                                </div>
                            </div>
                            
                            <div>
                                <label for="subject" class="block mb-2 text-sm font-medium">Subject</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <i class="fas fa-tag text-gray-400"></i>
                                    </div>
                                    <select id="subject" name="subject" class="w-full bg-[#0F0A1F] border border-gray-700 rounded-lg pl-10 p-3 text-white focus:outline-none focus:border-[#00FF99] transition-colors appearance-none">
                                        <option value="general">General Inquiry</option>
                                        <option value="support">Technical Support</option>
                                        <option value="account">Account Issues</option>
                                        <option value="billing">Billing Questions</option>
                                        <option value="partnership">Partnership Opportunities</option>
                                        <option value="feedback">Feedback &amp; Suggestions</option>
                                    </select>
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                        <i class="fas fa-chevron-down text-gray-400"></i>
                                    </div>
                                </div>
                            </div>
                            
                            <div>
                                <label for="message" class="block mb-2 text-sm font-medium">Your Message</label>
                                <div class="relative">
                                    <textarea id="message" name="message" rows="5" class="w-full bg-[#0F0A1F] border border-gray-700 rounded-lg p-3 text-white focus:outline-none focus:border-[#00FF99] transition-colors" placeholder="How can we help you?" required=""></textarea>
                                </div>
                            </div>
                            
                            <div class="flex items-center">
                                <input id="privacy" type="checkbox" class="w-4 h-4 bg-[#0F0A1F] border-gray-700 rounded focus:ring-[#00FF99] focus:ring-1" required="">
                                <label for="privacy" class="ml-2 text-sm text-gray-300">
                                    I agree to the <a href="#" class="text-[#00FF99] hover:underline">Privacy Policy</a> and consent to processing my data.
                                </label>
                            </div>
                            
                            <button type="submit" class="w-full bg-gradient-to-r from-[#00FF99] to-[#00FF99]/80 text-black py-3 rounded-lg hover:brightness-110 transition-all font-medium flex items-center justify-center">
                                <i class="fas fa-paper-plane mr-2"></i>
                                Send Message
                            </button>
                        </form>
                    </div>
                </div>
                
                <!-- Contact Information -->
                <div class="space-y-8">
                    <div class="bg-gradient-to-br from-[#1A1428] to-[#0F0A1F] rounded-2xl p-8 border border-[#00FF99]/10 shadow-xl">
                        <h2 class="text-2xl font-bold mb-6 flex items-center">
                            <i class="fas fa-info-circle text-[#00FF99] mr-3"></i>
                            Contact <span class="text-[#00FF99] ml-1">Information</span>
                        </h2>
                        
                        <div class="space-y-6">
                            <div class="flex items-start">
                                <div class="bg-[#00FF99]/10 rounded-full p-3 mr-4">
                                    <i class="fas fa-envelope text-[#00FF99]"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold mb-1">Email</h3>
                                    <p class="text-gray-300">info@{{ config('app.name') }}.com</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <div class="bg-[#00FF99]/10 rounded-full p-3 mr-4">
                                    <i class="fas fa-phone-alt text-[#00FF99]"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold mb-1">Phone</h3>
                                    <p class="text-gray-300">+1 (971)337-9856</p>
                                    <p class="text-gray-400 text-sm">Monday - Friday, 9AM - 6PM UTC</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <div class="bg-[#00FF99]/10 rounded-full p-3 mr-4">
                                    <i class="fas fa-headset text-[#00FF99]"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold mb-1">Support</h3>
                                    <p class="text-gray-300">24/7 Live Chat Support</p>
                                    <p class="text-gray-400 text-sm">Average response time: 5 minutes</p>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
                    <div class="bg-gradient-to-br from-[#1A1428] to-[#0F0A1F] rounded-2xl p-8 border border-[#00FF99]/10 shadow-xl">
                        <h2 class="text-2xl font-bold mb-6 flex items-center">
                            <i class="fas fa-globe text-[#00FF99] mr-3"></i>
                            Connect <span class="text-[#00FF99] ml-1">With Us</span>
                        </h2>
                        
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                            <a href="#" class="bg-[#0F0A1F] hover:bg-[#00FF99]/10 transition-colors rounded-xl p-4 text-center border border-gray-800 hover:border-[#00FF99]/30">
                                <i class="fab fa-whatsapp text-2xl text-[#00FF99] mb-2"></i>
                                <p class="text-sm">Whatsapp</p>
                            </a>
                            <a href="#" class="bg-[#0F0A1F] hover:bg-[#00FF99]/10 transition-colors rounded-xl p-4 text-center border border-gray-800 hover:border-[#00FF99]/30">
                                <i class="fab fa-twitter text-2xl text-[#00FF99] mb-2"></i>
                                <p class="text-sm">Twitter</p>
                            </a>
                            <a href="#" class="bg-[#0F0A1F] hover:bg-[#00FF99]/10 transition-colors rounded-xl p-4 text-center border border-gray-800 hover:border-[#00FF99]/30">
                                <i class="fab fa-telegram text-2xl text-[#00FF99] mb-2"></i>
                                <p class="text-sm">Telegram</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FAQ Section with Accordion -->
    <div class="py-16 bg-[#0A0714]" id="#faq">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <div class="inline-block mb-4 px-4 py-1 bg-[#00FF99]/10 rounded-full border border-[#00FF99]/20">
                    <span class="text-[#00FF99] text-sm font-medium">Got Questions?</span>
                </div>
                <h2 class="text-3xl font-bold mb-6">Frequently Asked <span class="text-[#00FF99]">Questions</span></h2>
                <p class="text-xl text-gray-300 max-w-3xl mx-auto">Find quick answers to common questions about our platform and services.</p>
            </div>
            
            <div class="max-w-4xl mx-auto">
                <div class="space-y-4" id="faq-accordion">
                    <!-- FAQ Item 1 -->
                    <div class="bg-[#1A1428] rounded-xl border border-[#00FF99]/10 overflow-hidden">
                        <button class="faq-toggle w-full flex items-center justify-between p-6 text-left focus:outline-none" data-target="faq-1">
                            <h3 class="text-xl font-semibold">How do I create an account?</h3>
                            <i class="fas fa-chevron-down text-[#00FF99] transition-transform duration-300"></i>
                        </button>
                        <div id="faq-1" class="faq-content hidden px-6 pb-6">
                            <p class="text-gray-300">
                                Creating an account is simple. Click on the "Sign Up" button in the top right corner of our website, fill in your details, verify your email address, and you're ready to start trading. The entire process takes less than 5 minutes.
                            </p>
                        </div>
                    </div>
                    
                    <!-- FAQ Item 2 -->
                    <div class="bg-[#1A1428] rounded-xl border border-[#00FF99]/10 overflow-hidden">
                        <button class="faq-toggle w-full flex items-center justify-between p-6 text-left focus:outline-none" data-target="faq-2">
                            <h3 class="text-xl font-semibold">Is my data secure on your platform?</h3>
                            <i class="fas fa-chevron-down text-[#00FF99] transition-transform duration-300"></i>
                        </button>
                        <div id="faq-2" class="faq-content hidden px-6 pb-6">
                            <p class="text-gray-300">
                                Yes, we implement industry-leading security measures including encryption, two-factor authentication, and regular security audits to ensure your data and assets are protected. We store the majority of assets in cold storage and maintain insurance coverage for digital assets held in our custody.
                            </p>
                        </div>
                    </div>
                    
                    <!-- FAQ Item 3 -->
                    <div class="bg-[#1A1428] rounded-xl border border-[#00FF99]/10 overflow-hidden">
                        <button class="faq-toggle w-full flex items-center justify-between p-6 text-left focus:outline-none" data-target="faq-3">
                            <h3 class="text-xl font-semibold">How does copy trading work?</h3>
                            <i class="fas fa-chevron-down text-[#00FF99] transition-transform duration-300"></i>
                        </button>
                        <div id="faq-3" class="faq-content hidden px-6 pb-6">
                            <p class="text-gray-300">
                                Copy trading allows you to automatically copy the trades of successful traders. You can browse trader profiles, view their performance history, and choose who to follow. When they make a trade, the same trade is executed in your account proportionally to your investment. You maintain full control and can stop copying at any time.
                            </p>
                        </div>
                    </div>
                    
                    <!-- FAQ Item 4 -->
                    <div class="bg-[#1A1428] rounded-xl border border-[#00FF99]/10 overflow-hidden">
                        <button class="faq-toggle w-full flex items-center justify-between p-6 text-left focus:outline-none" data-target="faq-4">
                            <h3 class="text-xl font-semibold">What are the fees for trading?</h3>
                            <i class="fas fa-chevron-down text-[#00FF99] transition-transform duration-300"></i>
                        </button>
                        <div id="faq-4" class="faq-content hidden px-6 pb-6">
                            <p class="text-gray-300">
                                Our fee structure is transparent and competitive. Trading fees typically range from 0.1% to 0.3% depending on your trading volume and account tier. We offer discounts for high-volume traders and users who hold our platform token. For a detailed breakdown of all fees, please visit our <a href="#" class="text-[#00FF99] hover:underline">Fees page</a>.
                            </p>
                        </div>
                    </div>
                    
                    <!-- FAQ Item 5 -->
                    <div class="bg-[#1A1428] rounded-xl border border-[#00FF99]/10 overflow-hidden">
                        <button class="faq-toggle w-full flex items-center justify-between p-6 text-left focus:outline-none" data-target="faq-5">
                            <h3 class="text-xl font-semibold">How do I deposit and withdraw funds?</h3>
                            <i class="fas fa-chevron-down text-[#00FF99] transition-transform duration-300"></i>
                        </button>
                        <div id="faq-5" class="faq-content hidden px-6 pb-6">
                            <p class="text-gray-300">
                                You can deposit funds using bank transfers, credit/debit cards, or cryptocurrency transfers. Withdrawals can be made to your bank account or cryptocurrency wallet. Processing times vary depending on the method, with crypto transfers typically being the fastest. All transactions are subject to security verification to protect your account.
                            </p>
                        </div>
                    </div>
                    
                    <!-- FAQ Item 6 -->
                    <div class="bg-[#1A1428] rounded-xl border border-[#00FF99]/10 overflow-hidden">
                        <button class="faq-toggle w-full flex items-center justify-between p-6 text-left focus:outline-none" data-target="faq-6">
                            <h3 class="text-xl font-semibold">What trading pairs do you support?</h3>
                            <i class="fas fa-chevron-down text-[#00FF99] transition-transform duration-300"></i>
                        </button>
                        <div id="faq-6" class="faq-content hidden px-6 pb-6">
                            <p class="text-gray-300">
                                We support over 100 trading pairs across major cryptocurrencies and fiat currencies. This includes popular pairs like BTC/USD, ETH/USD, BTC/EUR, as well as crypto-to-crypto pairs. We regularly add new trading pairs based on market demand and after thorough security and compliance reviews.
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="text-center mt-10">
                    <a href="#" class="inline-flex items-center px-6 py-3 bg-[#1A1428] border border-[#00FF99]/30 rounded-lg text-white hover:bg-[#00FF99]/10 transition-colors">
                        <i class="fas fa-question-circle mr-2"></i>
                        View All FAQs
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Animation Styles -->
    <style>
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }
        
        @keyframes ping-slow {
            0% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.5); opacity: 0.5; }
            100% { transform: scale(1); opacity: 1; }
        }
    </style>
    
    <!-- FAQ Accordion Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const faqToggles = document.querySelectorAll('.faq-toggle');
            
            faqToggles.forEach(toggle => {
                toggle.addEventListener('click', function() {
                    const targetId = this.getAttribute('data-target');
                    const content = document.getElementById(targetId);
                    const icon = this.querySelector('i');
                    
                    // Toggle the current FAQ
                    content.classList.toggle('hidden');
                    icon.classList.toggle('rotate-180');
                    
                    // Close other FAQs
                    faqToggles.forEach(otherToggle => {
                        if (otherToggle !== toggle) {
                            const otherId = otherToggle.getAttribute('data-target');
                            const otherContent = document.getElementById(otherId);
                            const otherIcon = otherToggle.querySelector('i');
                            
                            otherContent.classList.add('hidden');
                            otherIcon.classList.remove('rotate-180');
                        }
                    });
                });
            });
        });
    </script>
    </main>

    @endsection