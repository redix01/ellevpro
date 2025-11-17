@extends('pages.layout.app')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-[#0A0714] to-[#0D091C] py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <!-- Header -->
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-white mb-4">Terms of <span class="text-[#00FF99]">Service</span></h1>
            </div>

            <!-- Content -->
            <div class="bg-[#1A1428] rounded-xl p-8 border border-[#00FF99]/10">
                <div class="prose prose-invert max-w-none">
                    
                    <h2 class="text-2xl font-semibold text-white mb-4">1. Acceptance of Terms</h2>
                    <p class="text-gray-300 mb-6">
                        By accessing and using {{ config('app.name') }} ("the Platform"), you accept and agree to be bound by the terms and provision of this agreement. If you do not agree to abide by the above, please do not use this service.
                    </p>

                    <h2 class="text-2xl font-semibold text-white mb-4">2. Description of Service</h2>
                    <p class="text-gray-300 mb-6">
                        {{ config('app.name') }} is an advanced trading platform that provides:
                    </p>
                    <ul class="text-gray-300 mb-6 list-disc list-inside space-y-2">
                        <li>Cryptocurrency and stock trading services</li>
                        <li>AI-powered trading bots and automated trading systems</li>
                        <li>Copy trading functionality</li>
                        <li>Portfolio management tools</li>
                        <li>Educational resources and market analysis</li>
                        <li>Staking and mining services</li>
                    </ul>

                    <h2 class="text-2xl font-semibold text-white mb-4">3. User Accounts</h2>
                    <p class="text-gray-300 mb-4">
                        To access certain features of the Platform, you must create an account. You agree to:
                    </p>
                    <ul class="text-gray-300 mb-6 list-disc list-inside space-y-2">
                        <li>Provide accurate, current, and complete information</li>
                        <li>Maintain and update your account information</li>
                        <li>Keep your password secure and confidential</li>
                        <li>Accept responsibility for all activities under your account</li>
                        <li>Notify us immediately of any unauthorized use</li>
                    </ul>

                    <h2 class="text-2xl font-semibold text-white mb-4">4. Trading and Investment Risks</h2>
                    <p class="text-gray-300 mb-4">
                        <strong class="text-red-400">IMPORTANT RISK WARNING:</strong> Trading cryptocurrencies, stocks, and other financial instruments involves substantial risk of loss and is not suitable for all investors. You acknowledge that:
                    </p>
                    <ul class="text-gray-300 mb-6 list-disc list-inside space-y-2">
                        <li>Past performance does not guarantee future results</li>
                        <li>You may lose some or all of your invested capital</li>
                        <li>Market volatility can result in significant losses</li>
                        <li>AI trading bots and automated systems carry additional risks</li>
                        <li>You should only invest what you can afford to lose</li>
                    </ul>

                    <h2 class="text-2xl font-semibold text-white mb-4">5. Prohibited Activities</h2>
                    <p class="text-gray-300 mb-4">You agree not to:</p>
                    <ul class="text-gray-300 mb-6 list-disc list-inside space-y-2">
                        <li>Use the Platform for any illegal or unauthorized purpose</li>
                        <li>Attempt to gain unauthorized access to any part of the Platform</li>
                        <li>Interfere with or disrupt the Platform's operation</li>
                        <li>Use automated systems to access the Platform without permission</li>
                        <li>Manipulate or attempt to manipulate market prices</li>
                        <li>Engage in money laundering or terrorist financing</li>
                        <li>Violate any applicable laws or regulations</li>
                    </ul>

                    <h2 class="text-2xl font-semibold text-white mb-4">6. Fees and Payments</h2>
                    <p class="text-gray-300 mb-4">
                        The Platform may charge fees for various services. You agree to:
                    </p>
                    <ul class="text-gray-300 mb-6 list-disc list-inside space-y-2">
                        <li>Pay all applicable fees as described in our fee schedule</li>
                        <li>Authorize us to deduct fees from your account balance</li>
                        <li>Understand that fees are non-refundable unless otherwise stated</li>
                        <li>Be responsible for any taxes applicable to your transactions</li>
                    </ul>

                    <h2 class="text-2xl font-semibold text-white mb-4">7. Intellectual Property</h2>
                    <p class="text-gray-300 mb-6">
                        The Platform and its original content, features, and functionality are owned by {{ config('app.name') }} and are protected by international copyright, trademark, patent, trade secret, and other intellectual property laws.
                    </p>

                    <h2 class="text-2xl font-semibold text-white mb-4">8. Privacy and Data Protection</h2>
                    <p class="text-gray-300 mb-6">
                        Your privacy is important to us. Please review our Privacy Policy, which also governs your use of the Platform, to understand our practices.
                    </p>

                    <h2 class="text-2xl font-semibold text-white mb-4">9. Disclaimers and Limitations</h2>
                    <p class="text-gray-300 mb-4">
                        The Platform is provided "as is" and "as available" without warranties of any kind. We disclaim all warranties, express or implied, including but not limited to:
                    </p>
                    <ul class="text-gray-300 mb-6 list-disc list-inside space-y-2">
                        <li>Warranties of merchantability and fitness for a particular purpose</li>
                        <li>Warranties regarding the accuracy or reliability of information</li>
                        <li>Warranties that the Platform will be uninterrupted or error-free</li>
                        <li>Warranties regarding the security of your data</li>
                    </ul>

                    <h2 class="text-2xl font-semibold text-white mb-4">10. Limitation of Liability</h2>
                    <p class="text-gray-300 mb-6">
                        In no event shall {{ config('app.name') }} be liable for any indirect, incidental, special, consequential, or punitive damages, including without limitation, loss of profits, data, use, goodwill, or other intangible losses, resulting from your use of the Platform.
                    </p>

                    <h2 class="text-2xl font-semibold text-white mb-4">11. Termination</h2>
                    <p class="text-gray-300 mb-6">
                        We may terminate or suspend your account and access to the Platform immediately, without prior notice or liability, for any reason whatsoever, including without limitation if you breach the Terms.
                    </p>

                    <h2 class="text-2xl font-semibold text-white mb-4">12. Governing Law</h2>
                    <p class="text-gray-300 mb-6">
                        These Terms shall be interpreted and governed by the laws of the jurisdiction in which {{ config('app.name') }} operates, without regard to its conflict of law provisions.
                    </p>

                    <h2 class="text-2xl font-semibold text-white mb-4">13. Changes to Terms</h2>
                    <p class="text-gray-300 mb-6">
                        We reserve the right, at our sole discretion, to modify or replace these Terms at any time. If a revision is material, we will try to provide at least 30 days notice prior to any new terms taking effect.
                    </p>

                    <h2 class="text-2xl font-semibold text-white mb-4">14. Contact Information</h2>
                    <p class="text-gray-300 mb-6">
                        If you have any questions about these Terms of Service, please contact us through our support channels or visit our contact page.
                    </p>

                </div>
            </div>

            <!-- Back to Home -->
            <div class="text-center mt-8">
                <a href="{{ route('index') }}" class="inline-flex items-center px-6 py-3 bg-[#00FF99] text-black font-semibold rounded-lg hover:bg-[#00FF99]/80 transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to Home
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
