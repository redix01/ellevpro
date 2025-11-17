@extends('pages.layout.app')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-[#0A0714] to-[#0D091C] py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <!-- Header -->
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-white mb-4">Privacy <span class="text-[#00FF99]">Policy</span></h1>
            </div>

            <!-- Content -->
            <div class="bg-[#1A1428] rounded-xl p-8 border border-[#00FF99]/10">
                <div class="prose prose-invert max-w-none">
                    
                    <h2 class="text-2xl font-semibold text-white mb-4">1. Introduction</h2>
                    <p class="text-gray-300 mb-6">
                        {{ config('app.name') }} ("we," "our," or "us") is committed to protecting your privacy. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you use our trading platform and services.
                    </p>

                    <h2 class="text-2xl font-semibold text-white mb-4">2. Information We Collect</h2>
                    
                    <h3 class="text-xl font-semibold text-[#00FF99] mb-3">2.1 Personal Information</h3>
                    <p class="text-gray-300 mb-4">We may collect the following personal information:</p>
                    <ul class="text-gray-300 mb-6 list-disc list-inside space-y-2">
                        <li>Name, email address, and phone number</li>
                        <li>Date of birth and government-issued identification</li>
                        <li>Address and country of residence</li>
                        <li>Financial information for account verification</li>
                        <li>Bank account details and payment information</li>
                        <li>Profile pictures and other profile information</li>
                    </ul>

                    <h3 class="text-xl font-semibold text-[#00FF99] mb-3">2.2 Trading Information</h3>
                    <ul class="text-gray-300 mb-6 list-disc list-inside space-y-2">
                        <li>Trading history and transaction records</li>
                        <li>Portfolio holdings and investment preferences</li>
                        <li>Risk tolerance and investment objectives</li>
                        <li>API keys and trading configurations</li>
                        <li>Bot trading strategies and performance data</li>
                    </ul>

                    <h3 class="text-xl font-semibold text-[#00FF99] mb-3">2.3 Technical Information</h3>
                    <ul class="text-gray-300 mb-6 list-disc list-inside space-y-2">
                        <li>IP address and device information</li>
                        <li>Browser type and version</li>
                        <li>Operating system and device identifiers</li>
                        <li>Usage patterns and platform interactions</li>
                        <li>Cookies and similar tracking technologies</li>
                    </ul>

                    <h2 class="text-2xl font-semibold text-white mb-4">3. How We Use Your Information</h2>
                    <p class="text-gray-300 mb-4">We use your information for the following purposes:</p>
                    <ul class="text-gray-300 mb-6 list-disc list-inside space-y-2">
                        <li>Provide and maintain our trading services</li>
                        <li>Process transactions and manage your account</li>
                        <li>Verify your identity and comply with regulatory requirements</li>
                        <li>Improve our platform and develop new features</li>
                        <li>Provide customer support and respond to inquiries</li>
                        <li>Send important notifications and updates</li>
                        <li>Detect and prevent fraud and security threats</li>
                        <li>Comply with legal obligations and enforce our terms</li>
                    </ul>

                    <h2 class="text-2xl font-semibold text-white mb-4">4. Information Sharing and Disclosure</h2>
                    
                    <h3 class="text-xl font-semibold text-[#00FF99] mb-3">4.1 We Do Not Sell Your Information</h3>
                    <p class="text-gray-300 mb-6">
                        We do not sell, trade, or rent your personal information to third parties for marketing purposes.
                    </p>

                    <h3 class="text-xl font-semibold text-[#00FF99] mb-3">4.2 When We May Share Information</h3>
                    <p class="text-gray-300 mb-4">We may share your information in the following circumstances:</p>
                    <ul class="text-gray-300 mb-6 list-disc list-inside space-y-2">
                        <li>With service providers who assist in platform operations</li>
                        <li>With financial institutions for payment processing</li>
                        <li>With regulatory authorities when required by law</li>
                        <li>In connection with business transfers or mergers</li>
                        <li>To protect our rights, property, or safety</li>
                        <li>With your explicit consent</li>
                    </ul>

                    <h2 class="text-2xl font-semibold text-white mb-4">5. Data Security</h2>
                    <p class="text-gray-300 mb-4">We implement comprehensive security measures to protect your information:</p>
                    <ul class="text-gray-300 mb-6 list-disc list-inside space-y-2">
                        <li>End-to-end encryption for sensitive data</li>
                        <li>Multi-factor authentication for account access</li>
                        <li>Regular security audits and penetration testing</li>
                        <li>Secure data centers with physical security measures</li>
                        <li>Employee training on data protection practices</li>
                        <li>Incident response procedures for security breaches</li>
                    </ul>

                    <h2 class="text-2xl font-semibold text-white mb-4">6. Data Retention</h2>
                    <p class="text-gray-300 mb-6">
                        We retain your personal information for as long as necessary to provide our services, comply with legal obligations, resolve disputes, and enforce our agreements. Trading records and financial data may be retained for extended periods as required by applicable regulations.
                    </p>

                    <h2 class="text-2xl font-semibold text-white mb-4">7. Your Rights and Choices</h2>
                    <p class="text-gray-300 mb-4">Depending on your jurisdiction, you may have the following rights:</p>
                    <ul class="text-gray-300 mb-6 list-disc list-inside space-y-2">
                        <li>Access and review your personal information</li>
                        <li>Correct inaccurate or incomplete information</li>
                        <li>Delete your personal information (subject to legal requirements)</li>
                        <li>Restrict or object to certain processing activities</li>
                        <li>Data portability and transfer rights</li>
                        <li>Withdraw consent for data processing</li>
                        <li>File complaints with supervisory authorities</li>
                    </ul>

                    <h2 class="text-2xl font-semibold text-white mb-4">8. Cookies and Tracking Technologies</h2>
                    <p class="text-gray-300 mb-4">We use cookies and similar technologies to:</p>
                    <ul class="text-gray-300 mb-6 list-disc list-inside space-y-2">
                        <li>Remember your preferences and settings</li>
                        <li>Analyze platform usage and performance</li>
                        <li>Provide personalized content and features</li>
                        <li>Ensure platform security and prevent fraud</li>
                        <li>Improve user experience and functionality</li>
                    </ul>

                    <h2 class="text-2xl font-semibold text-white mb-4">9. International Data Transfers</h2>
                    <p class="text-gray-300 mb-6">
                        Your information may be transferred to and processed in countries other than your own. We ensure appropriate safeguards are in place to protect your information in accordance with applicable data protection laws.
                    </p>

                    <h2 class="text-2xl font-semibold text-white mb-4">10. Children's Privacy</h2>
                    <p class="text-gray-300 mb-6">
                        Our services are not intended for individuals under the age of 18. We do not knowingly collect personal information from children under 18. If we become aware that we have collected such information, we will take steps to delete it promptly.
                    </p>

                    <h2 class="text-2xl font-semibold text-white mb-4">11. Third-Party Services</h2>
                    <p class="text-gray-300 mb-6">
                        Our platform may contain links to third-party websites or services. This Privacy Policy does not apply to those third-party services. We encourage you to review the privacy policies of any third-party services you use.
                    </p>

                    <h2 class="text-2xl font-semibold text-white mb-4">12. Changes to This Privacy Policy</h2>
                    <p class="text-gray-300 mb-6">
                        We may update this Privacy Policy from time to time. We will notify you of any material changes by posting the new Privacy Policy on this page and updating the "Last updated" date. Your continued use of our services after such changes constitutes acceptance of the updated policy.
                    </p>

                    <h2 class="text-2xl font-semibold text-white mb-4">13. Contact Us</h2>
                    <p class="text-gray-300 mb-6">
                        If you have any questions about this Privacy Policy or our data practices, please contact us through our support channels or visit our contact page. We are committed to addressing your concerns and protecting your privacy rights.
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
