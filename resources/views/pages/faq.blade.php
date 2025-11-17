@extends('pages.layout.app')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-[#0A0714] to-[#0D091C] py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <!-- Header -->
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-white mb-4">Frequently Asked <span class="text-[#00FF99]">Questions</span></h1>
                <p class="text-gray-400 text-lg">Find answers to common questions about our trading platform</p>
            </div>

            <!-- Search Bar -->
            <div class="mb-8">
                <div class="relative">
                    <input type="text" id="faqSearch" placeholder="Search FAQ..." 
                           class="w-full px-4 py-3 pl-12 bg-[#1A1428] border border-[#00FF99]/20 rounded-lg text-white placeholder-gray-400 focus:border-[#00FF99] focus:ring-1 focus:ring-[#00FF99] transition-colors">
                    <svg class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>

            <!-- FAQ Content -->
            <div class="space-y-6">
                
                <!-- General Questions -->
                <div class="faq-category" data-category="general">
                    <h2 class="text-2xl font-semibold text-white mb-6 flex items-center">
                        <svg class="w-6 h-6 mr-3 text-[#00FF99]" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path>
                        </svg>
                        General Questions
                    </h2>
                    
                    <div class="space-y-4">
                        <div class="faq-item bg-[#1A1428] rounded-lg border border-[#00FF99]/10">
                            <button class="faq-question w-full px-6 py-4 text-left flex justify-between items-center hover:bg-[#00FF99]/5 transition-colors">
                                <span class="text-white font-medium">What is {{ config('app.name') }}?</span>
                                <svg class="faq-icon w-5 h-5 text-[#00FF99] transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div class="faq-answer hidden px-6 pb-4">
                                <p class="text-gray-300">
                                    {{ config('app.name') }} is an advanced trading platform that offers cryptocurrency and stock trading, AI-powered trading bots, copy trading, portfolio management, and various investment tools. We provide professional-grade trading services for both beginners and experienced traders.
                                </p>
                            </div>
                        </div>

                        <div class="faq-item bg-[#1A1428] rounded-lg border border-[#00FF99]/10">
                            <button class="faq-question w-full px-6 py-4 text-left flex justify-between items-center hover:bg-[#00FF99]/5 transition-colors">
                                <span class="text-white font-medium">How do I get started?</span>
                                <svg class="faq-icon w-5 h-5 text-[#00FF99] transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div class="faq-answer hidden px-6 pb-4">
                                <p class="text-gray-300 mb-3">Getting started is easy:</p>
                                <ol class="text-gray-300 list-decimal list-inside space-y-2">
                                    <li>Create an account by clicking "Sign Up"</li>
                                    <li>Verify your email address</li>
                                    <li>Complete your profile and KYC verification</li>
                                    <li>Deposit funds to your account</li>
                                    <li>Start trading or choose an investment plan</li>
                                </ol>
                            </div>
                        </div>

                        <div class="faq-item bg-[#1A1428] rounded-lg border border-[#00FF99]/10">
                            <button class="faq-question w-full px-6 py-4 text-left flex justify-between items-center hover:bg-[#00FF99]/5 transition-colors">
                                <span class="text-white font-medium">Is the platform secure?</span>
                                <svg class="faq-icon w-5 h-5 text-[#00FF99] transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div class="faq-answer hidden px-6 pb-4">
                                <p class="text-gray-300">
                                    Yes, security is our top priority. We use bank-grade encryption, multi-factor authentication, cold storage for digital assets, regular security audits, and comply with international financial regulations. Your funds and personal information are protected with industry-leading security measures.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Trading Questions -->
                <div class="faq-category" data-category="trading">
                    <h2 class="text-2xl font-semibold text-white mb-6 flex items-center">
                        <svg class="w-6 h-6 mr-3 text-[#00FF99]" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"></path>
                        </svg>
                        Trading & Investment
                    </h2>
                    
                    <div class="space-y-4">
                        <div class="faq-item bg-[#1A1428] rounded-lg border border-[#00FF99]/10">
                            <button class="faq-question w-full px-6 py-4 text-left flex justify-between items-center hover:bg-[#00FF99]/5 transition-colors">
                                <span class="text-white font-medium">What assets can I trade?</span>
                                <svg class="faq-icon w-5 h-5 text-[#00FF99] transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div class="faq-answer hidden px-6 pb-4">
                                <p class="text-gray-300">
                                    You can trade a wide variety of assets including major cryptocurrencies (Bitcoin, Ethereum, etc.), stocks from global markets, forex pairs, commodities, and indices. We offer 120+ trading pairs with competitive spreads and low fees.
                                </p>
                            </div>
                        </div>

                        <div class="faq-item bg-[#1A1428] rounded-lg border border-[#00FF99]/10">
                            <button class="faq-question w-full px-6 py-4 text-left flex justify-between items-center hover:bg-[#00FF99]/5 transition-colors">
                                <span class="text-white font-medium">What are the trading fees?</span>
                                <svg class="faq-icon w-5 h-5 text-[#00FF99] transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div class="faq-answer hidden px-6 pb-4">
                                <p class="text-gray-300">
                                    Our trading fees start at 0.1% per trade, which is among the lowest in the industry. We offer volume discounts for high-volume traders and no hidden fees. All fees are clearly displayed before you execute any trade.
                                </p>
                            </div>
                        </div>

                        <div class="faq-item bg-[#1A1428] rounded-lg border border-[#00FF99]/10">
                            <button class="faq-question w-full px-6 py-4 text-left flex justify-between items-center hover:bg-[#00FF99]/5 transition-colors">
                                <span class="text-white font-medium">How do AI trading bots work?</span>
                                <svg class="faq-icon w-5 h-5 text-[#00FF99] transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div class="faq-answer hidden px-6 pb-4">
                                <p class="text-gray-300">
                                    Our AI trading bots use advanced algorithms to analyze market data, identify trading opportunities, and execute trades automatically 24/7. You can customize risk parameters, set stop-losses, and choose from various trading strategies. The bots continuously learn and adapt to market conditions.
                                </p>
                            </div>
                        </div>

                        <div class="faq-item bg-[#1A1428] rounded-lg border border-[#00FF99]/10">
                            <button class="faq-question w-full px-6 py-4 text-left flex justify-between items-center hover:bg-[#00FF99]/5 transition-colors">
                                <span class="text-white font-medium">What is copy trading?</span>
                                <svg class="faq-icon w-5 h-5 text-[#00FF99] transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div class="faq-answer hidden px-6 pb-4">
                                <p class="text-gray-300">
                                    Copy trading allows you to automatically copy the trades of successful traders. You can browse top-performing traders, analyze their strategies, and choose to copy their trades with your own risk management settings. This is perfect for beginners who want to learn from experienced traders.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Account & Payments -->
                <div class="faq-category" data-category="account">
                    <h2 class="text-2xl font-semibold text-white mb-6 flex items-center">
                        <svg class="w-6 h-6 mr-3 text-[#00FF99]" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                        </svg>
                        Account & Payments
                    </h2>
                    
                    <div class="space-y-4">
                        <div class="faq-item bg-[#1A1428] rounded-lg border border-[#00FF99]/10">
                            <button class="faq-question w-full px-6 py-4 text-left flex justify-between items-center hover:bg-[#00FF99]/5 transition-colors">
                                <span class="text-white font-medium">How do I deposit funds?</span>
                                <svg class="faq-icon w-5 h-5 text-[#00FF99] transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div class="faq-answer hidden px-6 pb-4">
                                <p class="text-gray-300 mb-3">You can deposit funds using various methods:</p>
                                <ul class="text-gray-300 list-disc list-inside space-y-2">
                                    <li>Bank transfers (wire transfer, ACH)</li>
                                    <li>Credit/debit cards</li>
                                    <li>Cryptocurrency deposits</li>
                                    <li>E-wallets and payment processors</li>
                                </ul>
                                <p class="text-gray-300 mt-3">Deposits are typically processed within 1-3 business days, while crypto deposits are usually instant.</p>
                            </div>
                        </div>

                        <div class="faq-item bg-[#1A1428] rounded-lg border border-[#00FF99]/10">
                            <button class="faq-question w-full px-6 py-4 text-left flex justify-between items-center hover:bg-[#00FF99]/5 transition-colors">
                                <span class="text-white font-medium">How do I withdraw my funds?</span>
                                <svg class="faq-icon w-5 h-5 text-[#00FF99] transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div class="faq-answer hidden px-6 pb-4">
                                <p class="text-gray-300">
                                    Withdrawals can be made to the same methods used for deposits. Simply go to the withdrawal section, select your preferred method, enter the amount, and confirm. Withdrawals are typically processed within 1-3 business days. Please note that you may need to complete KYC verification before making withdrawals.
                                </p>
                            </div>
                        </div>

                        <div class="faq-item bg-[#1A1428] rounded-lg border border-[#00FF99]/10">
                            <button class="faq-question w-full px-6 py-4 text-left flex justify-between items-center hover:bg-[#00FF99]/5 transition-colors">
                                <span class="text-white font-medium">What is KYC verification?</span>
                                <svg class="faq-icon w-5 h-5 text-[#00FF99] transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div class="faq-answer hidden px-6 pb-4">
                                <p class="text-gray-300">
                                    KYC (Know Your Customer) verification is a regulatory requirement that helps us verify your identity and comply with anti-money laundering laws. You'll need to provide a government-issued ID, proof of address, and sometimes a selfie. This process helps protect your account and ensures platform security.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Support -->
                <div class="faq-category" data-category="support">
                    <h2 class="text-2xl font-semibold text-white mb-6 flex items-center">
                        <svg class="w-6 h-6 mr-3 text-[#00FF99]" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-2 0c0 .993-.241 1.929-.668 2.754l-1.524-1.525a3.997 3.997 0 00.078-2.183l1.562-1.562C15.759 8.071 16 9.007 16 10zm-5.165 3.913l1.58 1.58A5.98 5.98 0 0110 16a5.976 5.976 0 01-2.516-.552l1.562-1.562a4.006 4.006 0 001.789.027zm-4.677-2.532a1 1 0 00-1.414-1.414l-.705.705a2 2 0 01-2.83-2.83l.705-.705a1 1 0 00-1.414-1.414l-.705.705a3.99 3.99 0 00-1.05 3.172A3.99 3.99 0 003.83 13.83l.705.705a1 1 0 001.414 1.414l.705-.705a2 2 0 012.83 2.83l-.705.705a1 1 0 001.414 1.414l.705-.705a3.99 3.99 0 003.172 1.05 3.99 3.99 0 003.172-1.05l.705.705a1 1 0 001.414-1.414l-.705-.705a3.99 3.99 0 00-1.05-3.172 3.99 3.99 0 00-1.05-3.172l.705-.705a1 1 0 00-1.414-1.414l-.705.705a2 2 0 01-2.83-2.83l.705-.705a1 1 0 00-1.414-1.414l-.705.705a3.99 3.99 0 00-1.05 3.172 3.99 3.99 0 00-1.05 3.172l-.705.705z" clip-rule="evenodd"></path>
                        </svg>
                        Support & Contact
                    </h2>
                    
                    <div class="space-y-4">
                        <div class="faq-item bg-[#1A1428] rounded-lg border border-[#00FF99]/10">
                            <button class="faq-question w-full px-6 py-4 text-left flex justify-between items-center hover:bg-[#00FF99]/5 transition-colors">
                                <span class="text-white font-medium">How can I contact support?</span>
                                <svg class="faq-icon w-5 h-5 text-[#00FF99] transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div class="faq-answer hidden px-6 pb-4">
                                <p class="text-gray-300 mb-3">We offer 24/7 customer support through multiple channels:</p>
                                <ul class="text-gray-300 list-disc list-inside space-y-2">
                                    <li>Live chat on our platform</li>
                                    <li>Email support</li>
                                    <li>Phone support</li>
                                    <li>Help center and documentation</li>
                                    <li>Community forums</li>
                                </ul>
                            </div>
                        </div>

                        <div class="faq-item bg-[#1A1428] rounded-lg border border-[#00FF99]/10">
                            <button class="faq-question w-full px-6 py-4 text-left flex justify-between items-center hover:bg-[#00FF99]/5 transition-colors">
                                <span class="text-white font-medium">What are your trading hours?</span>
                                <svg class="faq-icon w-5 h-5 text-[#00FF99] transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div class="faq-answer hidden px-6 pb-4">
                                <p class="text-gray-300">
                                    Our platform operates 24/7 for cryptocurrency trading. Stock markets follow their respective trading hours (typically Monday-Friday, 9:30 AM - 4:00 PM local time). Forex markets are open 24/5 (Monday-Friday). Our AI bots and copy trading features work around the clock.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Contact Support -->
            <div class="mt-12 bg-[#1A1428] rounded-xl p-8 border border-[#00FF99]/10 text-center">
                <h3 class="text-2xl font-semibold text-white mb-4">Still have questions?</h3>
                <p class="text-gray-300 mb-6">Our support team is here to help you 24/7</p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('contact') }}" class="inline-flex items-center px-6 py-3 bg-[#00FF99] text-black font-semibold rounded-lg hover:bg-[#00FF99]/80 transition-colors">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                        </svg>
                        Contact Support
                    </a>
                    <a href="{{ route('index') }}" class="inline-flex items-center px-6 py-3 border border-[#00FF99] text-[#00FF99] font-semibold rounded-lg hover:bg-[#00FF99]/10 transition-colors">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back to Home
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // FAQ Toggle Functionality
    const faqQuestions = document.querySelectorAll('.faq-question');
    
    faqQuestions.forEach(question => {
        question.addEventListener('click', function() {
            const answer = this.nextElementSibling;
            const icon = this.querySelector('.faq-icon');
            
            // Close all other FAQ items
            faqQuestions.forEach(otherQuestion => {
                if (otherQuestion !== this) {
                    const otherAnswer = otherQuestion.nextElementSibling;
                    const otherIcon = otherQuestion.querySelector('.faq-icon');
                    otherAnswer.classList.add('hidden');
                    otherIcon.style.transform = 'rotate(0deg)';
                }
            });
            
            // Toggle current FAQ item
            if (answer.classList.contains('hidden')) {
                answer.classList.remove('hidden');
                icon.style.transform = 'rotate(180deg)';
            } else {
                answer.classList.add('hidden');
                icon.style.transform = 'rotate(0deg)';
            }
        });
    });
    
    // Search Functionality
    const searchInput = document.getElementById('faqSearch');
    const faqItems = document.querySelectorAll('.faq-item');
    const faqCategories = document.querySelectorAll('.faq-category');
    
    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        
        faqItems.forEach(item => {
            const question = item.querySelector('.faq-question span').textContent.toLowerCase();
            const answer = item.querySelector('.faq-answer').textContent.toLowerCase();
            
            if (question.includes(searchTerm) || answer.includes(searchTerm)) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
        
        // Show/hide categories based on visible items
        faqCategories.forEach(category => {
            const visibleItems = category.querySelectorAll('.faq-item[style*="block"], .faq-item:not([style*="none"])');
            if (visibleItems.length > 0 || searchTerm === '') {
                category.style.display = 'block';
            } else {
                category.style.display = 'none';
            }
        });
    });
});
</script>
@endsection
