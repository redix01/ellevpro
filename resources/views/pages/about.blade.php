@extends('pages.layout.app')
@section('content')

<main>
            <!-- Hero Section with Parallax Effect -->
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
            <div class="text-center mb-12">
                <div class="inline-block mb-4 px-6 py-2 bg-[#00FF99]/10 rounded-full border border-[#00FF99]/20">
                    <span class="text-[#00FF99] font-medium">Our Private Partnership</span>
                </div>
                <h1 class="text-4xl md:text-6xl font-bold mb-6 leading-tight">About <span class="text-[#00FF99]">{{ config('app.name') }}</span></h1>
                <p class="text-xl text-gray-300 max-w-3xl mx-auto leading-relaxed">
                    Empowering traders with cutting-edge technology and innovative solutions since 2021.
                </p>
            </div>

            <div class="relative rounded-2xl overflow-hidden mb-16 shadow-2xl shadow-[#00FF99]/10 border border-[#00FF99]/10 group">
                <div class="absolute inset-0 bg-gradient-to-r from-[#00FF99]/20 to-purple-600/20 blur-xl opacity-30 group-hover:opacity-40 transition-opacity"></div>
                <img src="{{ asset('front/images/elon-musk.jpg') }}" alt="About {{ config('app.name') }}" class="w-full h-64 md:h-[500px] object-cover rounded-2xl relative z-10 transition-transform duration-700 group-hover:scale-105">
                <div class="absolute inset-0 bg-gradient-to-t from-[#0A0714] via-transparent to-transparent z-20 rounded-2xl"></div>
                <div class="absolute bottom-0 left-0 right-0 p-6 md:p-10 z-30">
                    <div class="flex items-center space-x-4 mb-4">
                        <div class="w-12 h-12 rounded-full bg-[#00FF99]/20 flex items-center justify-center">
                            <i class="fas fa-chart-line text-[#00FF99]"></i>
                        </div>
                        <div>
                            <div class="text-white font-medium">LARRY FINK</div>
                            <div class="text-gray-300 text-sm">Chairman &amp; Ceo</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                    <p>Larry fink Co-founded {{ config('app.name') }} in 1988 and has served as its Chairman and CEO ever since, guiding its transformation into the world's largest asset manager, overseeing over $11.5 trillion in assets</p>

    <!-- Our Mission & Vision -->
    <div class="py-16 bg-gradient-to-b from-[#0A0714] to-[#0D091C]">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
                <div>
                    <div class="inline-block mb-4 px-4 py-1 bg-[#00FF99]/10 rounded-full border border-[#00FF99]/20">
                        <span class="text-[#00FF99] text-sm font-medium">Our Purpose</span>
                    </div>
                    <h2 class="text-3xl md:text-4xl font-bold mb-6">Our <span class="text-[#00FF99]">Mission &amp; Vision</span></h2>

                    <div class="mb-8 bg-[#1A1428] p-6 rounded-xl border-l-4 border-[#00FF99]">
                        <h3 class="text-xl font-semibold mb-3 flex items-center">
                            <i class="fas fa-bullseye text-[#00FF99] mr-3"></i>
                            Our Mission
                        </h3>
                        <p class="text-gray-300">To democratize trading by providing accessible, powerful tools that empower individuals to participate in financial markets with confidence and security.</p>
                    </div>

                    <div class="mb-8 bg-[#1A1428] p-6 rounded-xl border-l-4 border-purple-500">
                        <h3 class="text-xl font-semibold mb-3 flex items-center">
                            <i class="fas fa-eye text-purple-500 mr-3"></i>
                            Our Vision
                        </h3>
                        <p class="text-gray-300">To become the world's leading platform for digital asset trading, known for innovation, security, and exceptional user experience.</p>
                    </div>

                    <p class="text-gray-300">{{ config('app.name') }} was Founded
1988 (by Larry Fink &amp; team) Private Partnership with ELON REEVE MUSK
Assets Under Management
~$11.5–11.6 trillion (2024–25)
Key Offerings
iShares ETFs, Aladdin analytics, public/private market investments
Strategic Direction
Expanded into private markets via major acquisitions (GIP, HPS, Preqin)
2025–2030 Ambitions
$400B private fundraising; double market cap; increase private revenue
Leadership Transition
Continued focus on digital assets &amp; ESG via new leadership roles
Global Risk Practices
Heightened data-security measures—especially in China.</p>
                </div>

                <div>
                    <div class="bg-[#0D091C] p-8 rounded-2xl border border-[#00FF99]/10 shadow-xl relative overflow-hidden">
                        <div class="absolute top-0 right-0 w-40 h-40 bg-[#00FF99]/5 rounded-full blur-3xl -mr-20 -mt-20"></div>

                        <div class="relative z-10">
                            <div class="flex items-center justify-between mb-8">
                                <h3 class="text-2xl font-bold">Company <span class="text-[#00FF99]">Stats</span></h3>
                                <div class="px-3 py-1 bg-[#00FF99]/10 rounded-full border border-[#00FF99]/20">
                                    <span class="text-[#00FF99] text-sm">2023 Data</span>
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-6">
                                <div class="bg-[#1A1428]/50 p-5 rounded-xl border border-[#00FF99]/5 hover:border-[#00FF99]/20 transition-colors">
                                    <div class="text-[#00FF99] text-4xl font-bold mb-2 flex items-end">
                                        50K+ <span class="text-sm text-gray-400 ml-2">users</span>
                                    </div>
                                    <p class="text-gray-300">Active Traders</p>
                                    <div class="mt-2 text-green-400 text-sm flex items-center">
                                        <i class="fas fa-arrow-up mr-1"></i> 27% growth
                                    </div>
                                </div>

                                <div class="bg-[#1A1428]/50 p-5 rounded-xl border border-[#00FF99]/5 hover:border-[#00FF99]/20 transition-colors">
                                    <div class="text-[#00FF99] text-4xl font-bold mb-2 flex items-end">
                                        100+ <span class="text-sm text-gray-400 ml-2">pairs</span>
                                    </div>
                                    <p class="text-gray-300">Trading Pairs</p>
                                    <div class="mt-2 text-green-400 text-sm flex items-center">
                                        <i class="fas fa-arrow-up mr-1"></i> 15 new this month
                                    </div>
                                </div>

                                <div class="bg-[#1A1428]/50 p-5 rounded-xl border border-[#00FF99]/5 hover:border-[#00FF99]/20 transition-colors">
                                    <div class="text-[#00FF99] text-4xl font-bold mb-2 flex items-end">
                                        24/7 <span class="text-sm text-gray-400 ml-2">support</span>
                                    </div>
                                    <p class="text-gray-300">Customer Service</p>
                                    <div class="mt-2 text-gray-400 text-sm flex items-center">
                                        <i class="fas fa-clock mr-1"></i> 10 min avg. response
                                    </div>
                                </div>

                                <div class="bg-[#1A1428]/50 p-5 rounded-xl border border-[#00FF99]/5 hover:border-[#00FF99]/20 transition-colors">
                                    <div class="text-[#00FF99] text-4xl font-bold mb-2 flex items-end">
                                        99.9% <span class="text-sm text-gray-400 ml-2">uptime</span>
                                    </div>
                                    <p class="text-gray-300">Platform Reliability</p>
                                    <div class="mt-2 text-gray-400 text-sm flex items-center">
                                        <i class="fas fa-shield-alt mr-1"></i> Enterprise security
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Our Story Timeline -->
    <div class="py-16 bg-[#0D091C]">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <div class="inline-block mb-4 px-4 py-1 bg-[#00FF99]/10 rounded-full border border-[#00FF99]/20">
                    <span class="text-[#00FF99] text-sm font-medium">Our Journey</span>
                </div>
                <h2 class="text-3xl md:text-4xl font-bold mb-6">Our <span class="text-[#00FF99]">Story</span></h2>
                <p class="text-xl text-gray-300 max-w-3xl mx-auto">The evolution of {{ config('app.name') }} from idea to global trading platform.</p>
            </div>

            <div class="relative">
                <!-- Timeline Line -->
                <div class="absolute left-1/2 transform -translate-x-1/2 h-full w-1 bg-gradient-to-b from-[#00FF99]/50 via-[#00FF99]/20 to-purple-500/50 rounded-full hidden md:block"></div>

                <!-- Timeline Items -->
                <div class="space-y-12 relative">
                    <!-- 2021: Foundation -->
                    <div class="flex flex-col md:flex-row items-center">
                        <div class="md:w-1/2 md:pr-12 md:text-right mb-6 md:mb-0">
                            <div class="bg-[#1A1428] p-6 rounded-xl border border-[#00FF99]/10 inline-block">
                                <h3 class="text-xl font-semibold mb-2">Foundation</h3>
                                <p class="text-gray-300">{{ config('app.name') }} was founded by a team of traders and developers with a vision to democratize trading.</p>
                            </div>
                        </div>
                        <div class="md:w-1/2 md:pl-12 flex flex-col items-center md:items-start">
                            <div class="w-10 h-10 rounded-full bg-[#00FF99] flex items-center justify-center mb-4 z-10">
                                <i class="fas fa-flag text-[#0A0714]"></i>
                            </div>
                            <div class="text-[#00FF99] font-bold text-xl">2021</div>
                        </div>
                    </div>

                    <!-- 2022: Growth -->
                    <div class="flex flex-col md:flex-row items-center">
                        <div class="md:w-1/2 md:pr-12 md:text-right order-2 md:order-1">
                            <div class="text-[#00FF99] font-bold text-xl">2022</div>
                        </div>
                        <div class="md:w-1/2 md:pl-12 flex flex-col items-center md:items-start order-1 md:order-2 mb-6 md:mb-0">
                            <div class="w-10 h-10 rounded-full bg-[#00FF99]/80 flex items-center justify-center mb-4 z-10">
                                <i class="fas fa-chart-line text-[#0A0714]"></i>
                            </div>
                            <div class="bg-[#1A1428] p-6 rounded-xl border border-[#00FF99]/10 inline-block">
                                <h3 class="text-xl font-semibold mb-2">Rapid Growth</h3>
                                <p class="text-gray-300">Reached 10,000 users and expanded our team to 25 employees across 3 continents.</p>
                            </div>
                        </div>
                    </div>

                    <!-- 2023: Innovation -->
                    <div class="flex flex-col md:flex-row items-center">
                        <div class="md:w-1/2 md:pr-12 md:text-right mb-6 md:mb-0">
                            <div class="bg-[#1A1428] p-6 rounded-xl border border-[#00FF99]/10 inline-block">
                                <h3 class="text-xl font-semibold mb-2">Innovation</h3>
                                <p class="text-gray-300">Launched our AI-powered trading bots and expanded to 100+ trading pairs.</p>
                            </div>
                        </div>
                        <div class="md:w-1/2 md:pl-12 flex flex-col items-center md:items-start">
                            <div class="w-10 h-10 rounded-full bg-[#00FF99]/60 flex items-center justify-center mb-4 z-10">
                                <i class="fas fa-robot text-[#0A0714]"></i>
                            </div>
                            <div class="text-[#00FF99] font-bold text-xl">2023</div>
                        </div>
                    </div>

                    <!-- 2024: Present -->
                    <div class="flex flex-col md:flex-row items-center">
                        <div class="md:w-1/2 md:pr-12 md:text-right order-2 md:order-1">
                            <div class="text-[#00FF99] font-bold text-xl">2024</div>
                        </div>
                        <div class="md:w-1/2 md:pl-12 flex flex-col items-center md:items-start order-1 md:order-2 mb-6 md:mb-0">
                            <div class="w-10 h-10 rounded-full bg-purple-500/80 flex items-center justify-center mb-4 z-10">
                                <i class="fas fa-globe text-[#0A0714]"></i>
                            </div>
                            <div class="bg-[#1A1428] p-6 rounded-xl border border-purple-500/10 inline-block">
                                <h3 class="text-xl font-semibold mb-2">Global Expansion</h3>
                                <p class="text-gray-300">Today, we serve 50,000+ users worldwide and continue to innovate in the trading space.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Our Values -->
    <div class="py-16 bg-gradient-to-b from-[#0D091C] to-[#0A0714]">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <div class="inline-block mb-4 px-4 py-1 bg-[#00FF99]/10 rounded-full border border-[#00FF99]/20">
                    <span class="text-[#00FF99] text-sm font-medium">What We Stand For</span>
                </div>
                <h2 class="text-3xl md:text-4xl font-bold mb-6">Our <span class="text-[#00FF99]">Values</span></h2>
                <p class="text-xl text-gray-300 max-w-3xl mx-auto">The principles that guide everything we do.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-[#1A1428] rounded-xl border border-[#00FF99]/10 hover:border-[#00FF99]/30 transition-all hover:transform hover:-translate-y-1 hover:shadow-lg hover:shadow-[#00FF99]/5 overflow-hidden">
                    <div class="h-48 relative overflow-hidden">
                        <img src="{{ asset('front/images/WhatsApp%20Image%202025-07-25%20at%2001.31.58_a689b84d.jpg') }}" alt="ELON REEVE MUSK" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#1A1428]/80 via-transparent to-transparent"></div>
                        <div class="absolute bottom-4 left-4">
                            <div class="w-12 h-12 rounded-full bg-[#00FF99]/20 flex items-center justify-center">
                                <i class="fas fa-lock text-[#00FF99] text-xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="p-8">
                        <h3 class="text-xl font-semibold mb-3">Security First</h3>
                        <p class="text-gray-300 mb-4">Founded
1988 (by Larry Fink &amp; team) Private Partnership with ELON REEVE MUSK
Assets Under Management
~$11.5–11.6 trillion (2024–25)
Key Offerings
iShares ETFs, Aladdin analytics, public/private market investments
Strategic Direction
Expanded into private markets via major acquisitions (GIP, HPS, Preqin)
2025–2030 Ambitions
$400B private fundraising; double market cap; increase private revenue
Leadership Transition
Continued focus on digital assets &amp; ESG via new leadership roles
Global Risk Practices
Heightened data-security measures—especially&nbsp;in&nbsp;China</p>
                        <ul class="text-gray-400 space-y-2">
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-[#00FF99] mt-1 mr-2"></i>
                                <span>Multi-factor authentication</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-[#00FF99] mt-1 mr-2"></i>
                                <span>Cold storage for 95% of assets</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-[#00FF99] mt-1 mr-2"></i>
                                <span>Regular security audits</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="bg-[#1A1428] rounded-xl border border-[#00FF99]/10 hover:border-[#00FF99]/30 transition-all hover:transform hover:-translate-y-1 hover:shadow-lg hover:shadow-[#00FF99]/5 overflow-hidden">
                    <div class="h-48 relative overflow-hidden">
                        <img src="{{ asset('front/images/WhatsApp%20Image%202025-07-27%20at%2020.44.48_f5568352.jpg') }}" alt="Innovation" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#1A1428]/80 via-transparent to-transparent"></div>
                        <div class="absolute bottom-4 left-4">
                            <div class="w-12 h-12 rounded-full bg-[#F59E0B]/20 flex items-center justify-center">
                                <i class="fas fa-lightbulb text-[#F59E0B] text-xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="p-8">
                        <h3 class="text-xl font-semibold mb-3">Innovation</h3>
                        <p class="text-gray-300 mb-4">Today, we are hosting our 2025 Investor Day, which offers a look into {{ config('app.name') }}’s long-term vision. Our leadership team shares how we’re positioning the firm to be stronger, more resilient, and drive greater value for clients and stakeholders through 2030&nbsp;and&nbsp;beyond.</p>
                        <ul class="text-gray-400 space-y-2">
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-[#00FF99] mt-1 mr-2"></i>
                                <span>AI-powered trading algorithms</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-[#00FF99] mt-1 mr-2"></i>
                                <span>Advanced charting tools</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-[#00FF99] mt-1 mr-2"></i>
                                <span>Continuous platform improvements</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="bg-[#1A1428] rounded-xl border border-[#00FF99]/10 hover:border-[#00FF99]/30 transition-all hover:transform hover:-translate-y-1 hover:shadow-lg hover:shadow-[#00FF99]/5 overflow-hidden">
                    <div class="h-48 relative overflow-hidden">
                        <img src="{{ asset('front/images/WhatsApp%20Image%202025-07-27%20at%2020.42.38_5f5e32e5.jpg') }}" alt="Community" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#1A1428]/80 via-transparent to-transparent"></div>
                        <div class="absolute bottom-4 left-4">
                            <div class="w-12 h-12 rounded-full bg-[#10B981]/20 flex items-center justify-center">
                                <i class="fas fa-users text-[#10B981] text-xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="p-8">
                        <h3 class="text-xl font-semibold mb-3">Community</h3>
                        <p class="text-gray-300 mb-4">We believe in the power of community, fostering an environment where traders can learn from each other and grow together.</p>
                        <ul class="text-gray-400 space-y-2">
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-[#00FF99] mt-1 mr-2"></i>
                                <span>Active trader forums</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-[#00FF99] mt-1 mr-2"></i>
                                <span>Educational resources</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-[#00FF99] mt-1 mr-2"></i>
                                <span>Community-driven feature development</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonials Section -->
    <div class="py-16 bg-[#0A0714]">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <div class="inline-block mb-4 px-4 py-1 bg-[#00FF99]/10 rounded-full border border-[#00FF99]/20">
                    <span class="text-[#00FF99] text-sm font-medium">What People Say</span>
                </div>
                <h2 class="text-3xl md:text-4xl font-bold mb-6">Trader <span class="text-[#00FF99]">Testimonials</span></h2>
                <p class="text-xl text-gray-300 max-w-3xl mx-auto">Hear from our community of traders around the world.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-[#1A1428] p-6 rounded-xl border border-[#00FF99]/10 relative">
                    <div class="absolute -top-4 -left-4 w-8 h-8 bg-[#00FF99] rounded-full flex items-center justify-center">
                        <i class="fas fa-quote-left text-[#0A0714]"></i>
                    </div>
                    <div class="mb-4">
                        <div class="flex text-[#00FF99]">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <p class="text-gray-300 mb-6 italic">"{{ config('app.name') }} has transformed my trading experience. The platform is intuitive, the tools are powerful, and the support team is always there when I need them."</p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 rounded-full bg-gradient-to-r from-blue-500 to-purple-500 mr-4 flex items-center justify-center text-white font-bold">JM</div>
                        <div>
                            <div class="font-medium">James Miller</div>
                            <div class="text-gray-400 text-sm">Day Trader, London</div>
                        </div>
                    </div>
                </div>

                <div class="bg-[#1A1428] p-6 rounded-xl border border-[#00FF99]/10 relative">
                    <div class="absolute -top-4 -left-4 w-8 h-8 bg-[#00FF99] rounded-full flex items-center justify-center">
                        <i class="fas fa-quote-left text-[#0A0714]"></i>
                    </div>
                    <div class="mb-4">
                        <div class="flex text-[#00FF99]">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <p class="text-gray-300 mb-6 italic">"The AI trading bots have been a game-changer for me. I've seen consistent returns and the platform's security gives me peace of mind about my investments."</p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 rounded-full bg-gradient-to-r from-green-500 to-teal-500 mr-4 flex items-center justify-center text-white font-bold">SC</div>
                        <div>
                            <div class="font-medium">Sarah Chen</div>
                            <div class="text-gray-400 text-sm">Investor, Singapore</div>
                        </div>
                    </div>
                </div>

                <div class="bg-[#1A1428] p-6 rounded-xl border border-[#00FF99]/10 relative">
                    <div class="absolute -top-4 -left-4 w-8 h-8 bg-[#00FF99] rounded-full flex items-center justify-center">
                        <i class="fas fa-quote-left text-[#0A0714]"></i>
                    </div>
                    <div class="mb-4">
                        <div class="flex text-[#00FF99]">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                    <p class="text-gray-300 mb-6 italic">"As a beginner, I was intimidated by trading platforms, but {{ config('app.name') }} made it easy to get started. The educational resources and community support have been invaluable."</p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 rounded-full bg-gradient-to-r from-amber-500 to-orange-500 mr-4 flex items-center justify-center text-white font-bold">RG</div>
                        <div>
                            <div class="font-medium">Robert Garcia</div>
                            <div class="text-gray-400 text-sm">New Trader, Toronto</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Our Team -->
    <div class="py-16 bg-gradient-to-b from-[#0A0714] to-[#0D091C]">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <div class="inline-block mb-4 px-4 py-1 bg-[#00FF99]/10 rounded-full border border-[#00FF99]/20">
                    <span class="text-[#00FF99] text-sm font-medium">Meet Our Experts</span>
                </div>
                <h2 class="text-3xl md:text-4xl font-bold mb-6">Our <span class="text-[#00FF99]">Team</span></h2>
                <p class="text-xl text-gray-300 max-w-3xl mx-auto">The talented individuals behind {{ config('app.name') }}.</p>
            </div>

            <!-- First Row - Original 4 Team Members -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
                <div class="bg-[#1A1428] rounded-xl border border-[#00FF99]/10 overflow-hidden group">
                    <div class="h-48 bg-gradient-to-r from-blue-500 to-teal-400 relative overflow-hidden">
                        <img src="https://via.placeholder.com/300x300/2FE6DE/FFFFFF?text=JD" alt="James Donovan" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#1A1428]/80 via-transparent to-transparent"></div>
                        <div class="w-24 h-24 rounded-full border-4 border-[#1A1428] absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1/2 overflow-hidden">
                            <img src="https://via.placeholder.com/150x150/2FE6DE/FFFFFF?text=JD" alt="James Donovan Profile" class="w-full h-full object-cover">
                        </div>
                    </div>
                    <div class="pt-16 p-6 text-center">
                        <h3 class="text-xl font-semibold mb-1">James Donovan</h3>
                        <p class="text-[#00FF99] mb-3">CEO &amp; Founder</p>
                        <p class="text-gray-300 text-sm mb-4">Former hedge fund manager with over 15 years of trading experience.</p>
                        <div class="flex justify-center space-x-3">
                            <a href="#" class="w-8 h-8 rounded-full bg-[#0D091C] flex items-center justify-center text-gray-400 hover:text-[#00FF99] transition-colors">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="#" class="w-8 h-8 rounded-full bg-[#0D091C] flex items-center justify-center text-gray-400 hover:text-[#00FF99] transition-colors">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="bg-[#1A1428] rounded-xl border border-[#00FF99]/10 overflow-hidden group">
                    <div class="h-48 bg-gradient-to-r from-purple-500 to-pink-400 relative overflow-hidden">
                        <img src="https://via.placeholder.com/300x300/8B5CF6/FFFFFF?text=MP" alt="Maria Patel" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#1A1428]/80 via-transparent to-transparent"></div>
                        <div class="w-24 h-24 rounded-full border-4 border-[#1A1428] absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1/2 overflow-hidden">
                            <img src="https://via.placeholder.com/150x150/8B5CF6/FFFFFF?text=MP" alt="Maria Patel Profile" class="w-full h-full object-cover">
                        </div>
                    </div>
                    <div class="pt-16 p-6 text-center">
                        <h3 class="text-xl font-semibold mb-1">Maria Patel</h3>
                        <p class="text-[#00FF99] mb-3">CTO</p>
                        <p class="text-gray-300 text-sm mb-4">Tech innovator with experience at leading fintech companies.</p>
                        <div class="flex justify-center space-x-3">
                            <a href="#" class="w-8 h-8 rounded-full bg-[#0D091C] flex items-center justify-center text-gray-400 hover:text-[#00FF99] transition-colors">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="#" class="w-8 h-8 rounded-full bg-[#0D091C] flex items-center justify-center text-gray-400 hover:text-[#00FF99] transition-colors">
                                <i class="fab fa-github"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="bg-[#1A1428] rounded-xl border border-[#00FF99]/10 overflow-hidden group">
                    <div class="h-48 bg-gradient-to-r from-amber-500 to-orange-400 relative overflow-hidden">
                        <img src="https://via.placeholder.com/300x300/F59E0B/FFFFFF?text=TW" alt="Thomas Wilson" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#1A1428]/80 via-transparent to-transparent"></div>
                        <div class="w-24 h-24 rounded-full border-4 border-[#1A1428] absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1/2 overflow-hidden">
                            <img src="https://via.placeholder.com/150x150/F59E0B/FFFFFF?text=TW" alt="Thomas Wilson Profile" class="w-full h-full object-cover">
                        </div>
                    </div>
                    <div class="pt-16 p-6 text-center">
                        <h3 class="text-xl font-semibold mb-1">Thomas Wilson</h3>
                        <p class="text-[#00FF99] mb-3">Head of Security</p>
                        <p class="text-gray-300 text-sm mb-4">Cybersecurity expert dedicated to protecting our users' assets.</p>
                        <div class="flex justify-center space-x-3">
                            <a href="#" class="w-8 h-8 rounded-full bg-[#0D091C] flex items-center justify-center text-gray-400 hover:text-[#00FF99] transition-colors">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="#" class="w-8 h-8 rounded-full bg-[#0D091C] flex items-center justify-center text-gray-400 hover:text-[#00FF99] transition-colors">
                                <i class="fab fa-medium-m"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="bg-[#1A1428] rounded-xl border border-[#00FF99]/10 overflow-hidden group">
                    <div class="h-48 bg-gradient-to-r from-green-500 to-teal-400 relative overflow-hidden">
                        <img src="https://via.placeholder.com/300x300/10B981/FFFFFF?text=SL" alt="Sarah Lee" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#1A1428]/80 via-transparent to-transparent"></div>
                        <div class="w-24 h-24 rounded-full border-4 border-[#1A1428] absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1/2 overflow-hidden">
                            <img src="https://via.placeholder.com/150x150/10B981/FFFFFF?text=SL" alt="Sarah Lee Profile" class="w-full h-full object-cover">
                        </div>
                    </div>
                    <div class="pt-16 p-6 text-center">
                        <h3 class="text-xl font-semibold mb-1">Sarah Lee</h3>
                        <p class="text-[#00FF99] mb-3">Customer Success</p>
                        <p class="text-gray-300 text-sm mb-4">Passionate about helping users make the most of our platform.</p>
                        <div class="flex justify-center space-x-3">
                            <a href="#" class="w-8 h-8 rounded-full bg-[#0D091C] flex items-center justify-center text-gray-400 hover:text-[#00FF99] transition-colors">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="#" class="w-8 h-8 rounded-full bg-[#0D091C] flex items-center justify-center text-gray-400 hover:text-[#00FF99] transition-colors">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Second Row - New 4 Team Members -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="bg-[#1A1428] rounded-xl border border-[#00FF99]/10 overflow-hidden group">
                    <div class="h-48 bg-gradient-to-r from-red-500 to-pink-500 relative overflow-hidden">
                        <img src="https://via.placeholder.com/300x300/EF4444/FFFFFF?text=AR" alt="Alexander Rodriguez" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#1A1428]/80 via-transparent to-transparent"></div>
                        <div class="w-24 h-24 rounded-full border-4 border-[#1A1428] absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1/2 overflow-hidden">
                            <img src="https://via.placeholder.com/150x150/EF4444/FFFFFF?text=AR" alt="Alexander Rodriguez Profile" class="w-full h-full object-cover">
                        </div>
                    </div>
                    <div class="pt-16 p-6 text-center">
                        <h3 class="text-xl font-semibold mb-1">Alexander Rodriguez</h3>
                        <p class="text-[#00FF99] mb-3">Chief Financial Officer</p>
                        <p class="text-gray-300 text-sm mb-4">Former investment banker with expertise in financial operations and risk management.</p>
                        <div class="flex justify-center space-x-3">
                            <a href="#" class="w-8 h-8 rounded-full bg-[#0D091C] flex items-center justify-center text-gray-400 hover:text-[#00FF99] transition-colors">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="#" class="w-8 h-8 rounded-full bg-[#0D091C] flex items-center justify-center text-gray-400 hover:text-[#00FF99] transition-colors">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="bg-[#1A1428] rounded-xl border border-[#00FF99]/10 overflow-hidden group">
                    <div class="h-48 bg-gradient-to-r from-indigo-500 to-blue-600 relative overflow-hidden">
                        <img src="https://via.placeholder.com/300x300/6366F1/FFFFFF?text=EC" alt="Emily Chen" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#1A1428]/80 via-transparent to-transparent"></div>
                        <div class="w-24 h-24 rounded-full border-4 border-[#1A1428] absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1/2 overflow-hidden">
                            <img src="https://via.placeholder.com/150x150/6366F1/FFFFFF?text=EC" alt="Emily Chen Profile" class="w-full h-full object-cover">
                        </div>
                    </div>
                    <div class="pt-16 p-6 text-center">
                        <h3 class="text-xl font-semibold mb-1">Emily Chen</h3>
                        <p class="text-[#00FF99] mb-3">Head of Trading</p>
                        <p class="text-gray-300 text-sm mb-4">Quantitative trading specialist with 12+ years in algorithmic trading strategies.</p>
                        <div class="flex justify-center space-x-3">
                            <a href="#" class="w-8 h-8 rounded-full bg-[#0D091C] flex items-center justify-center text-gray-400 hover:text-[#00FF99] transition-colors">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="#" class="w-8 h-8 rounded-full bg-[#0D091C] flex items-center justify-center text-gray-400 hover:text-[#00FF99] transition-colors">
                                <i class="fab fa-medium-m"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="bg-[#1A1428] rounded-xl border border-[#00FF99]/10 overflow-hidden group">
                    <div class="h-48 bg-gradient-to-r from-cyan-500 to-blue-500 relative overflow-hidden">
                        <img src="https://via.placeholder.com/300x300/06B6D4/FFFFFF?text=DK" alt="David Kim" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#1A1428]/80 via-transparent to-transparent"></div>
                        <div class="w-24 h-24 rounded-full border-4 border-[#1A1428] absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1/2 overflow-hidden">
                            <img src="https://via.placeholder.com/150x150/06B6D4/FFFFFF?text=DK" alt="David Kim Profile" class="w-full h-full object-cover">
                        </div>
                    </div>
                    <div class="pt-16 p-6 text-center">
                        <h3 class="text-xl font-semibold mb-1">David Kim</h3>
                        <p class="text-[#00FF99] mb-3">Chief Marketing Officer</p>
                        <p class="text-gray-300 text-sm mb-4">Digital marketing strategist focused on building brand awareness and user acquisition.</p>
                        <div class="flex justify-center space-x-3">
                            <a href="#" class="w-8 h-8 rounded-full bg-[#0D091C] flex items-center justify-center text-gray-400 hover:text-[#00FF99] transition-colors">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="#" class="w-8 h-8 rounded-full bg-[#0D091C] flex items-center justify-center text-gray-400 hover:text-[#00FF99] transition-colors">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="bg-[#1A1428] rounded-xl border border-[#00FF99]/10 overflow-hidden group">
                    <div class="h-48 bg-gradient-to-r from-violet-500 to-purple-600 relative overflow-hidden">
                        <img src="https://via.placeholder.com/300x300/8B5CF6/FFFFFF?text=RN" alt="Rachel Newman" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#1A1428]/80 via-transparent to-transparent"></div>
                        <div class="w-24 h-24 rounded-full border-4 border-[#1A1428] absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1/2 overflow-hidden">
                            <img src="https://via.placeholder.com/150x150/8B5CF6/FFFFFF?text=RN" alt="Rachel Newman Profile" class="w-full h-full object-cover">
                        </div>
                    </div>
                    <div class="pt-16 p-6 text-center">
                        <h3 class="text-xl font-semibold mb-1">Rachel Newman</h3>
                        <p class="text-[#00FF99] mb-3">Head of Compliance</p>
                        <p class="text-gray-300 text-sm mb-4">Legal expert ensuring regulatory compliance across global financial markets.</p>
                        <div class="flex justify-center space-x-3">
                            <a href="#" class="w-8 h-8 rounded-full bg-[#0D091C] flex items-center justify-center text-gray-400 hover:text-[#00FF99] transition-colors">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="#" class="w-8 h-8 rounded-full bg-[#0D091C] flex items-center justify-center text-gray-400 hover:text-[#00FF99] transition-colors">
                                <i class="fab fa-medium-m"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-10">
                                    <a href="{{ route('contact') }}" class="inline-flex items-center px-6 py-3 bg-[#1A1428] border border-[#00FF99]/30 rounded-lg text-white hover:bg-[#00FF99]/10 transition-colors">
                    <i class="fas fa-users mr-2"></i>
                    Join Our Team
                </a>
            </div>
        </div>
    </div>

    <!-- Partners & Investors -->
    <div class="py-16 bg-[#0A0714]">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <div class="inline-block mb-4 px-4 py-1 bg-[#00FF99]/10 rounded-full border border-[#00FF99]/20">
                    <span class="text-[#00FF99] text-sm font-medium">Our Network</span>
                </div>
                <h2 class="text-3xl md:text-4xl font-bold mb-6">Partners &amp; <span class="text-[#00FF99]">Investors</span></h2>
                <p class="text-xl text-gray-300 max-w-3xl mx-auto">The organizations that support our vision.</p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="bg-[#1A1428] p-6 rounded-xl border border-[#00FF99]/10 flex items-center justify-center h-32">
                    <div class="text-center">
                        <div class="text-[#00FF99] text-3xl mb-2"><i class="fas fa-building"></i></div>
                        <div class="font-medium">Venture Capital</div>
                    </div>
                </div>

                <div class="bg-[#1A1428] p-6 rounded-xl border border-[#00FF99]/10 flex items-center justify-center h-32">
                    <div class="text-center">
                        <div class="text-[#00FF99] text-3xl mb-2"><i class="fas fa-university"></i></div>
                        <div class="font-medium">Global Bank</div>
                    </div>
                </div>

                <div class="bg-[#1A1428] p-6 rounded-xl border border-[#00FF99]/10 flex items-center justify-center h-32">
                    <div class="text-center">
                        <div class="text-[#00FF99] text-3xl mb-2"><i class="fas fa-shield-alt"></i></div>
                        <div class="font-medium">Security Firm</div>
                    </div>
                </div>

                <div class="bg-[#1A1428] p-6 rounded-xl border border-[#00FF99]/10 flex items-center justify-center h-32">
                    <div class="text-center">
                        <div class="text-[#00FF99] text-3xl mb-2"><i class="fas fa-code"></i></div>
                        <div class="font-medium">Tech Innovator</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="py-16 bg-gradient-to-b from-[#0D091C] to-[#0A0714]">
        <div class="container mx-auto px-4">
            <div class="bg-gradient-to-r from-[#1A1428] to-[#0D091C] p-8 md:p-12 rounded-2xl border border-[#00FF99]/20 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-64 h-64 bg-[#00FF99]/10 rounded-full blur-3xl -mr-32 -mt-32"></div>
                <div class="absolute bottom-0 left-0 w-64 h-64 bg-purple-500/10 rounded-full blur-3xl -ml-32 -mb-32"></div>

                <div class="relative z-10">
                    <div class="text-center max-w-3xl mx-auto">
                        <h2 class="text-3xl md:text-4xl font-bold mb-6">Join Our <span class="text-[#00FF99]">Community</span></h2>
                        <p class="text-xl text-gray-300 mb-8">Become part of a growing community of traders and investors shaping the future of finance together.</p>

                        <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4 mb-8">
                            <a href="{{ route('register') }}" class="px-8 py-4 bg-[#00FF99] text-[#0A0714] rounded-lg hover:bg-[#00FF99]/80 transition-colors font-medium text-center flex items-center justify-center">
                                <i class="fas fa-user-plus mr-2"></i>
                                Create Account
                            </a>
                            <a href="{{ route('contact') }}" class="px-8 py-4 border border-[#00FF99]/30 text-white rounded-lg hover:bg-[#00FF99]/10 transition-colors font-medium text-center flex items-center justify-center">
                                <i class="fas fa-envelope mr-2"></i>
                                Contact Us
                            </a>
                        </div>

                        <div class="flex flex-wrap justify-center gap-4">
                            <a href="#" class="flex items-center px-4 py-2 bg-[#0A0714]/50 rounded-full hover:bg-[#0A0714] transition-colors">
                                <i class="fab fa-twitter text-[#00FF99] mr-2"></i>
                                <span>Twitter</span>
                            </a>
                            <a href="#" class="flex items-center px-4 py-2 bg-[#0A0714]/50 rounded-full hover:bg-[#0A0714] transition-colors">
                                <i class="fab fa-telegram text-[#00FF99] mr-2"></i>
                                <span>Telegram</span>
                            </a>
                            <a href="#" class="flex items-center px-4 py-2 bg-[#0A0714]/50 rounded-full hover:bg-[#0A0714] transition-colors">
                                <i class="fab fa-discord text-[#00FF99] mr-2"></i>
                                <span>Discord</span>
                            </a>
                            <a href="#" class="flex items-center px-4 py-2 bg-[#0A0714]/50 rounded-full hover:bg-[#0A0714] transition-colors">
                                <i class="fab fa-linkedin text-[#00FF99] mr-2"></i>
                                <span>LinkedIn</span>
                            </a>
                        </div>
                    </div>
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
    </style>
    </main>

@endsection
