<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\ContactQuery;
use App\Models\HeroSlide;
use App\Models\Project;
use App\Models\Review;
use App\Models\Service;
use App\Models\Setting;
use App\Models\TeamMember;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedUsers();
        $this->seedServices();
        $this->seedProjects();
        $this->seedBlogs();
        $this->seedReviews();
        $this->seedTeam();
        $this->seedHeroSlides();
        $this->seedSettings();
        $this->seedContactQueries();
    }

    private function seedUsers(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@aheadsolarbd.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make(env('DEFAULT_SUPERADMIN_PASSWORD', 'admin123456')),
                'role' => 'superadmin',
            ]
        );
    }

    private function seedServices(): void
    {
        $services = [
            [
                'title' => 'Commercial & Industrial Energy Storage',
                'description' => 'Advanced energy storage for businesses — including the 200 kWh modular S1 Storage Cabinet and the 114 kWh all-in-one L1 Storage Cabinet.',
                'service_details' => '<p>We provide advanced commercial and industrial energy storage solutions designed for high-demand environments. Our flagship systems — the 200 kWh modular S1 Storage Cabinet and the 114 kWh all-in-one L1 Storage Cabinet — deliver reliable, scalable power when you need it most.</p><p>From factories to commercial facilities, our storage solutions reduce grid dependence, protect against outages, and optimize energy usage around the clock.</p><ul><li>200 kWh modular S1 Storage Cabinet for large-scale operations</li><li>114 kWh all-in-one L1 Storage Cabinet for compact, complete installations</li><li>Seamless integration with rooftop solar and existing infrastructure</li><li>Reduced peak demand charges and lower electricity costs</li></ul>',
                'image' => '/images/aheadsolar/about-1.jpg',
                'alt' => 'Commercial and industrial energy storage cabinets',
                'icon_name' => 'Battery',
                'slug' => 'commercial-industrial-energy-storage',
            ],
            [
                'title' => 'Rooftop Solar with BESS Fusion',
                'description' => 'Integrated rooftop solar panels paired with Battery Energy Storage Systems (BESS) for industries across Bangladesh.',
                'service_details' => '<p>We implement integrated rooftop solar panels paired with Battery Energy Storage Systems (BESS) to deliver reliable, round-the-clock clean power for various industries.</p><p>Our fusion approach combines solar generation with intelligent storage, ensuring consistent energy supply even when the sun isn\'t shining.</p><ul><li>Optimized rooftop solar design for maximum generation</li><li>Fully integrated BESS for energy reliability and independence</li><li>Smart energy management and real-time monitoring</li><li>Lower operating costs and reduced diesel dependence</li></ul>',
                'image' => '/images/aheadsolar/about-2.jpg',
                'alt' => 'Rooftop solar panels paired with battery storage',
                'icon_name' => 'Zap',
                'slug' => 'rooftop-solar-bess-fusion',
            ],
            [
                'title' => 'BIPV (Building-Integrated Photovoltaics)',
                'description' => 'Solar power systems seamlessly integrated into building structures — combining form and function in one solution.',
                'service_details' => '<p>Our BIPV (Building-Integrated Photovoltaics) projects design and install solar power systems that are seamlessly integrated into building structures — turning facades, roofs, and surfaces into clean energy generators.</p><p>Rather than adding panels on top of a building, BIPV makes the building itself part of the energy solution, blending aesthetics with performance.</p><ul><li>Solar elements integrated directly into building envelopes</li><li>Architecturally elegant designs that preserve building aesthetics</li><li>Dual purpose: structural function and energy generation</li><li>Long-term savings on construction and energy costs</li></ul>',
                'image' => '/images/aheadsolar/why-1.jpg',
                'alt' => 'Building-integrated photovoltaic design',
                'icon_name' => 'Sun',
                'slug' => 'bipv-projects',
            ],
            [
                'title' => 'Integrated Solar + Storage Projects',
                'description' => 'Advanced power systems with seamless switching between solar generation and battery storage.',
                'service_details' => '<p>We deliver advanced power systems that feature seamless switching between solar generation and battery storage — giving facilities uninterrupted, optimized power delivery.</p><p>Our integrated projects are engineered for maximum efficiency, automatically balancing solar, storage, and load in real time.</p><ul><li>Seamless switching between solar and battery power</li><li>Continuous power even during grid outages</li><li>Optimized energy dispatch for maximum savings</li><li>Complete design, installation, and long-term support</li></ul>',
                'image' => '/images/aheadsolar/about-3.jpg',
                'alt' => 'Integrated solar and battery storage system',
                'icon_name' => 'Shield',
                'slug' => 'integrated-solar-storage-projects',
            ],
            [
                'title' => 'OPEX Model Solar Projects',
                'description' => 'Operational Expenditure (OPEX) model for large-scale rooftop solar installations — such as our 650KWp project.',
                'service_details' => '<p>We offer an Operational Expenditure (OPEX) model for large-scale rooftop solar installations — such as our 650KWp project — letting businesses adopt solar with no upfront capital investment.</p><p>Under the OPEX model, we own, install, and maintain the system while you pay only for the clean energy you use, unlocking immediate savings.</p><ul><li>Zero upfront capital — pay only for energy consumed</li><li>Ideal for large-scale installations like our 650KWp project</li><li>Professional operation and maintenance included</li><li>Predictable, lower energy costs from day one</li></ul>',
                'image' => '/images/aheadsolar/why-2.jpg',
                'alt' => 'Large-scale rooftop solar installation under OPEX model',
                'icon_name' => 'Globe',
                'slug' => 'opex-model-solar-projects',
            ],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(['slug' => $service['slug']], $service);
        }
    }

    private function seedProjects(): void
    {
        $projects = [
            [
                'title' => 'Rooftop Solar Installation for Residential Homes',
                'image_url' => '/images/aheadsolar/project-1.jpg',
                'images' => ['/images/aheadsolar/project-1.jpg', '/images/aheadsolar/project-2.jpg', '/images/aheadsolar/project-3.jpg'],
                'slug' => 'rooftop-solar-installation-for-residential-homes',
                'category' => 'Residential Solar',
                'is_featured' => false,
                'client' => 'Johnson Family',
                'location' => 'Austin, TX',
                'description' => 'This project focused on designing and installing a high-efficiency rooftop solar system for a residential home to reduce electricity costs and promote the use of clean, renewable energy.',
                'project_details' => '<p>This project focused on designing and installing a high-efficiency rooftop solar system for a residential home to reduce electricity costs and promote the use of clean, renewable energy. The goal was to create a reliable, low-maintenance system that would provide long-term savings while supporting a sustainable lifestyle.</p><p>The homeowner wanted to lower monthly electricity bills and reduce dependence on the grid. They also requested a solution that would fit seamlessly with the existing roof structure and require minimal maintenance, while offering consistent performance throughout the year.</p>',
            ],
            [
                'title' => 'Industrial Solar Power Installation Manufacturing Unit',
                'image_url' => '/images/aheadsolar/project-2.jpg',
                'slug' => 'industrial-solar-power-installation-manufacturing-unit',
                'category' => 'Industrial Solar',
                'is_featured' => false,
                'client' => 'Apex Manufacturing',
                'location' => 'Detroit, MI',
                'description' => 'A large-scale industrial solar installation designed to power a manufacturing facility, significantly reducing operational energy costs and carbon emissions.',
                'project_details' => '<p>A large-scale industrial solar installation designed to power a manufacturing facility, significantly reducing operational energy costs and carbon emissions. This project involved installing high-capacity panels across multiple warehouse rooftops and ground-mounted arrays.</p><p>The system was engineered to meet the facility\'s substantial energy demands while providing long-term cost predictability and environmental benefits.</p>',
            ],
            [
                'title' => 'Sustainable Solar Energy Project for Communities',
                'image_url' => '/images/aheadsolar/project-3.jpg',
                'slug' => 'sustainable-solar-energy-project-for-communities',
                'category' => 'Community Solar',
                'is_featured' => false,
                'client' => 'Oakwood Community Council',
                'location' => 'Portland, OR',
                'description' => 'A community-focused solar initiative that brings affordable clean energy to multiple households.',
                'project_details' => '<p>A community-focused solar initiative that brings affordable clean energy to multiple households. This collaborative project allowed residents to benefit from solar power without individual rooftop installations.</p><p>The community solar model enables participants to receive credits on their electricity bills while supporting local renewable energy generation.</p>',
            ],
            [
                'title' => 'Commercial Solar Plant for Office Building',
                'image_url' => '/images/aheadsolar/project-4.jpg',
                'slug' => 'commercial-solar-plant-for-office-building',
                'category' => 'Commercial Solar',
                'is_featured' => false,
                'client' => 'Vanguard Corporate Center',
                'location' => 'Phoenix, AZ',
                'description' => 'A commercial solar plant installed on a large office building, designed to offset a significant portion of the facility\'s energy consumption.',
                'project_details' => '<p>A commercial solar plant installed on a large office building, designed to offset a significant portion of the facility\'s energy consumption. The system features high-efficiency panels and smart energy management.</p><p>This project demonstrates how commercial properties can achieve substantial energy savings while enhancing their sustainability credentials.</p>',
            ],
            [
                'title' => 'Solar Installation for Educational Institute',
                'image_url' => '/images/aheadsolar/project-5.jpg',
                'slug' => 'solar-installation-for-educational-institute',
                'category' => 'Community Solar',
                'is_featured' => false,
                'client' => 'Pinecrest High School',
                'location' => 'Denver, CO',
                'description' => 'A solar installation for an educational institute, providing hands-on learning opportunities for students while reducing operational costs.',
                'project_details' => '<p>A solar installation for an educational institute, providing hands-on learning opportunities for students while reducing operational costs. The system serves as both a power generation asset and an educational tool.</p><p>Students can monitor real-time energy production data and learn about renewable energy technology as part of their curriculum.</p>',
            ],
            [
                'title' => 'Hybrid Solar System for Hospital Facility',
                'image_url' => '/images/aheadsolar/project-6.jpg',
                'slug' => 'hybrid-solar-system-for-hospital-facility',
                'category' => 'Commercial Solar',
                'is_featured' => false,
                'client' => 'St. Jude Medical Center',
                'location' => 'Miami, FL',
                'description' => 'A hybrid solar system installed at a hospital facility, ensuring uninterrupted power supply for critical medical operations.',
                'project_details' => '<p>A hybrid solar system installed at a hospital facility, ensuring uninterrupted power supply for critical medical operations. The system combines solar panels with battery storage for reliable backup power.</p><p>This installation guarantees that essential equipment remains operational during grid outages, providing peace of mind for patients and staff.</p>',
            ],
        ];

        foreach ($projects as $project) {
            Project::updateOrCreate(['slug' => $project['slug']], $project);
        }
    }

    private function seedBlogs(): void
    {
        $blogs = [
            [
                'title' => 'A Complete Guide to Solar Energy for Homeowners',
                'category' => 'Residential Solar',
                'image_url' => '/images/aheadsolar/approach.jpg',
                'slug' => 'a-complete-guide-to-solar-energy-for-homeowners',
                'content' => 'Switching to solar energy is one of the smartest decisions homeowners can make today. With rising electricity costs & growing environmental concerns, solar power offers a clean, reliable, and cost-effective solution.',
                'tags' => ['Green Energy', 'Solar Energy', 'Sustainable Energy'],
                'date' => 'Jun 28, 2026',
                'blog_details' => '<p>Switching to solar energy is one of the smartest decisions homeowners can make today. With rising electricity costs &amp; growing environmental concerns, solar power offers a clean, reliable, and cost-effective solution. This guide will walk you through everything you need to know about solar energy &mdash; from how it works to how you can benefit from it in your daily life.</p><p>Solar energy is generated by capturing sunlight using solar panels and converting it into usable electricity. These panels produce direct current (DC) power, which is then converted into alternating current (AC) power by an inverter so it can be used in your home. Any excess energy can be sent back to the grid or stored in batteries for later use.</p><blockquote><p>Harnessing the power of the sun not only helps you save on electricity bills but also contributes to a cleaner environment, greater energy independence, and a more sustainable future for your home and family.</p></blockquote><p>Solar power helps reduce your monthly electricity bills, protects you from rising energy prices, and lowers your carbon footprint. It also increases your energy independence and can add long-term value to your property. With battery storage, you can even keep your home powered during outages.</p>',
            ],
            [
                'title' => 'Top Benefits of Switching to Solar Power in 2026',
                'category' => 'Solar Benefits',
                'image_url' => '/images/aheadsolar/banner.jpg',
                'slug' => 'top-benefits-of-switching-to-solar-power-in-2026',
                'content' => 'Harnessing the power of the sun not only helps you save on electricity bills but also contributes to a cleaner environment, greater energy independence, and a more sustainable future for your home and family.',
                'tags' => ['Savings', 'Clean Energy', 'Solar Benefits'],
                'date' => 'Jun 28, 2026',
                'blog_details' => '<p>Harnessing the power of the sun not only helps you save on electricity bills but also contributes to a cleaner environment, greater energy independence, and a more sustainable future for your home and family.</p><p>With solar panels, you can dramatically reduce your monthly utility costs while increasing the value of your property. In many regions, government incentives and tax credits make the switch even more affordable.</p>',
            ],
            [
                'title' => 'How Solar Panels Work: A Simple Guide for Homeowners',
                'category' => 'Installation Guide',
                'image_url' => '/images/aheadsolar/banner-2.jpg',
                'slug' => 'how-solar-panels-work-a-simple-guide-for-homeowners',
                'content' => 'Solar energy is generated by capturing sunlight using solar panels and converting it into usable electricity. These panels produce direct current (DC) power, which is then converted into alternating current (AC) power.',
                'tags' => ['Tech', 'DIY', 'Solar Basics'],
                'date' => 'Jun 27, 2026',
                'blog_details' => '<p>Solar energy is generated by capturing sunlight using solar panels and converting it into usable electricity. These panels produce direct current (DC) power, which is then converted into alternating current (AC) power by an inverter so it can be used in your home.</p><p>Understanding how solar panels work is the first step toward making an informed decision about adopting solar energy for your property. This guide breaks down the technology in simple terms.</p>',
            ],
            [
                'title' => 'Solar Installation Process Explained Step by Step',
                'category' => 'Solar Panels',
                'image_url' => '/images/aheadsolar/what.jpg',
                'slug' => 'solar-installation-process-explained-step-by-step',
                'content' => 'The installation process usually includes site inspection, system design, engineering, installation, and final testing. While the upfront cost may seem significant, systems typically pay for themselves.',
                'tags' => ['Installation', 'Expert Advice', 'Solar Panels'],
                'date' => 'Jun 27, 2026',
                'blog_details' => '<p>The installation process usually includes site inspection, system design, engineering, installation, and final testing. While the upfront cost may seem significant, solar systems typically pay for themselves over time through energy savings and incentives, making them a smart long-term investment.</p><p>Understanding each step of the process helps you prepare and ensures a smooth experience from start to finish.</p>',
            ],
            [
                'title' => 'Residential vs Commercial Solar: Which Is Right for You?',
                'category' => 'Energy Solutions',
                'image_url' => '/images/aheadsolar/why-1.jpg',
                'slug' => 'residential-vs-commercial-solar-which-is-right-for-you',
                'content' => 'Residential and commercial systems differ in scale, cost, structural setups, and financing. This detailed analysis compares performance metrics, roof design requirements, and payback periods.',
                'tags' => ['Commercial Solar', 'Residential Solar', 'Analysis'],
                'date' => 'Jun 26, 2026',
                'blog_details' => '<p>Residential and commercial systems differ in scale, cost, structural setups, and financing. This detailed analysis compares performance metrics, roof design requirements, and payback periods for both types of installations.</p><p>Whether you are a homeowner or a business owner, understanding these differences will help you choose the right solution for your energy needs.</p>',
            ],
            [
                'title' => 'How to Maintain Your Solar System for Peak Performance',
                'category' => 'Solar Maintenance',
                'image_url' => '/images/aheadsolar/why-2.jpg',
                'slug' => 'how-to-maintain-your-solar-system-for-peak-performance',
                'content' => 'One of the most effective ways to ensure solar system longevity is regular checkups. Maintain clean surfaces, look out for shadows, and monitor the inverter performance logging data regularly.',
                'tags' => ['Maintenance', 'Tips', 'Lifespan'],
                'date' => 'Jun 26, 2026',
                'blog_details' => '<p>One of the most effective ways to ensure solar system longevity is regular checkups. Maintain clean surfaces, look out for shadows, and monitor the inverter performance logging data regularly.</p><p>With proper maintenance, your solar system can operate at peak efficiency for 25 years or more, maximizing your return on investment.</p>',
            ],
        ];

        foreach ($blogs as $blog) {
            Blog::updateOrCreate(['slug' => $blog['slug']], $blog);
        }
    }

    private function seedReviews(): void
    {
        $reviews = [
            ['name' => 'Cameron Williamson', 'role' => 'Home Owner', 'rating' => 5, 'quote' => 'Switching to solar was one of the best decisions we made. The installation was seamless and our electricity bills dropped significantly within the first month.', 'created_at' => '2026-06-15 10:00:00'],
            ['name' => 'Leslie Alexander', 'role' => 'Retail Store Owner', 'rating' => 5, 'quote' => 'The team provided a solar solution for our residential complex. Professional approach, transparent pricing, and excellent after-sales support.', 'created_at' => '2026-06-10 08:30:00'],
            ['name' => 'Robert Fox', 'role' => 'Business Owner', 'rating' => 4, 'quote' => 'Great experience from start to finish. The consultation was thorough, installation was on time, and the system has been performing perfectly. Great experience from start to finish. The consultation was thorough, installation was on time, and the system has been performing perfectly. Great experience from start to finish. The consultation was thorough, installation was on time, and the system has been performing perfectly. Great experience from start to finish. The consultation was thorough, installation was on time, and the system has been performing perfectly.', 'created_at' => '2026-05-20 14:15:00'],
            ['name' => 'Sarah Mitchell', 'role' => 'Home Owner', 'rating' => 5, 'quote' => 'Our energy costs have been cut by over 60%. The team was professional and completed the installation ahead of schedule. Highly recommend their services.', 'created_at' => '2026-05-12 09:45:00'],
            ['name' => 'James Cooper', 'role' => 'Property Manager', 'rating' => 5, 'quote' => 'We\'ve installed solar panels on three of our properties. Each time the process was smooth and the results exceeded our expectations. Outstanding value.', 'created_at' => '2026-04-28 11:20:00'],
            ['name' => 'Emily Chen', 'role' => 'Home Owner', 'rating' => 4, 'quote' => 'The consultation was very informative. They helped us choose the right system for our home and the installation was completed in just one day.', 'created_at' => '2026-04-15 16:00:00'],
        ];

        foreach ($reviews as $review) {
            Review::updateOrCreate(['name' => $review['name']], $review);
        }
    }

    private function seedTeam(): void
    {
        $members = [
            [
                'name' => 'Leslie Alexander',
                'role' => 'Lead Solar Engineer',
                'image' => '/images/aheadsolar/team-1.jpg',
                'social_links' => [
                    'facebook' => 'https://www.facebook.com/',
                    'instagram' => 'https://www.instagram.com/',
                    'x' => 'https://www.x.com/',
                    'linkedin' => 'https://linkedin.com/company/ahead-solar-ltd/',
                ],
            ],
            [
                'name' => 'Marvin McKinney',
                'role' => 'Lead Solar Engineer',
                'image' => '/images/aheadsolar/team-2.jpg',
                'social_links' => [
                    'facebook' => 'https://www.facebook.com/',
                    'instagram' => 'https://www.instagram.com/',
                    'x' => 'https://www.x.com/',
                    'linkedin' => 'https://linkedin.com/company/ahead-solar-ltd/',
                ],
            ],
            [
                'name' => 'Kathryn Murphy',
                'role' => 'Lead Solar Engineer',
                'image' => '/images/aheadsolar/team-3.jpg',
                'social_links' => [
                    'facebook' => 'https://www.facebook.com/',
                    'instagram' => 'https://www.instagram.com/',
                    'x' => 'https://www.x.com/',
                    'linkedin' => 'https://linkedin.com/company/ahead-solar-ltd/',
                ],
            ],
        ];

        foreach ($members as $member) {
            TeamMember::updateOrCreate(['name' => $member['name']], $member);
        }
    }

    private function seedHeroSlides(): void
    {
        $slides = [
            [
                'tagline' => 'R&D Driven Solar Company',
                'title' => 'Pioneering Rooftop Solar',
                'title_accent' => 'for Industrial & Commercial Scale',
                'description' => 'We are a vertically integrated solar energy company offering end-to-end solutions — from system design and engineering to installation and long-term maintenance — customized to factory and business needs.',
                'background_video' => '/videos/hero.mp4',
                'site' => 'ahead',
                'video_url' => '',
                'show_video_button' => false,
                'is_active' => true,
                'order' => 1,
            ],
            [
                'tagline' => 'Proven Track Record',
                'title' => 'Delivering Large-Scale',
                'title_accent' => 'Rooftop Solar Projects Since 2021',
                'description' => 'With over 06 years of experience, we have designed and installed projects across RMG, Textile, FMCG, Agro, and Paper Mill sectors — earning the trust of Bangladesh\'s top-ranking companies.',
                'site' => 'ahead',
                'video_url' => '',
                'show_video_button' => false,
                'is_active' => true,
                'order' => 2,
            ],
            [
                'tagline' => 'CapEx & OpEx Models',
                'title' => 'Flexible Solar Solutions',
                'title_accent' => 'Tailored to Your Business',
                'description' => 'Whether you prefer to own your system with our CapEx model or start saving from day one with our OpEx model — we offer the right financial and technical solution for every business.',
                'site' => 'ahead',
                'video_url' => '',
                'show_video_button' => false,
                'is_active' => true,
                'order' => 3,
            ],
            [
                'tagline' => 'Palash Charging Station',
                'title' => '100% Solar-Charged',
                'title_accent' => 'Battery Rentals for Easy-Bikes & Mishuks',
                'description' => 'Rent fully charged lithium-ion batteries at an affordable price from our solar-powered Palash charging stations — fast, safe, and eco-friendly.',
                'background_video' => '/videos/palash-hero.mp4',
                'site' => 'palash',
                'video_url' => '',
                'show_video_button' => false,
                'is_active' => true,
                'order' => 1,
            ],
        ];

        HeroSlide::query()->delete();

        foreach ($slides as $slide) {
            HeroSlide::create($slide);
        }
    }

    private function seedSettings(): void
    {
        $sections = [
            [
                'id' => 'general',
                'title' => 'General Brand & Company Identity',
                'iconName' => 'Sliders',
                'color' => '#f59e0b',
                'fields' => [
                    ['label' => 'Brand Tagline', 'type' => 'text', 'value' => 'Empowering Your Clean Energy Future', 'id' => 'brand-tagline'],
                    ['label' => 'Support Email Address', 'type' => 'email', 'value' => 'info@aheadsolarbd.com', 'id' => 'contact-email'],
                    ['label' => 'Primary Phone Number', 'type' => 'tel', 'value' => '+88 01335 127 300', 'id' => 'phone-number'],
                    ['label' => 'Headquarters Address', 'type' => 'text', 'value' => 'House 12, Road 7, Sector 11, Uttara, Dhaka 1230', 'id' => 'hq-address'],
                ],
            ],
            [
                'id' => 'chat-widgets',
                'title' => 'Floating Chat & Messenger Widgets',
                'iconName' => 'MessageSquare',
                'color' => '#10b981',
                'fields' => [
                    ['label' => 'WhatsApp Phone Number (with Country Code)', 'type' => 'text', 'value' => '+8801712947551', 'id' => 'whatsapp-number'],
                    ['label' => 'WhatsApp Default Greeting Message', 'type' => 'text', 'value' => 'Hello Ahead Solar, I would like to inquire about solar energy solutions.', 'id' => 'whatsapp-message'],
                    ['label' => 'Facebook Messenger Username / Page ID', 'type' => 'text', 'value' => '61591154285690', 'id' => 'messenger-username'],
                    ['label' => 'Facebook Page URL', 'type' => 'url', 'value' => 'https://www.facebook.com/profile.php?id=61591154285690', 'id' => 'facebook-url'],
                    ['label' => 'LinkedIn Profile / Company URL', 'type' => 'url', 'value' => 'https://www.linkedin.com/company/ahead-solar-ltd/', 'id' => 'linkedin-url'],
                    ['label' => 'YouTube Channel URL', 'type' => 'url', 'value' => '', 'id' => 'youtube-url'],
                ],
                'toggles' => [
                    ['label' => 'Enable WhatsApp Direct Chat Button', 'checked' => true, 'id' => 'show-whatsapp'],
                    ['label' => 'Enable Facebook Messenger Button', 'checked' => true, 'id' => 'show-messenger'],
                    ['label' => 'Enable Facebook Button', 'checked' => true, 'id' => 'show-facebook'],
                    ['label' => 'Enable LinkedIn Button', 'checked' => true, 'id' => 'show-linkedin'],
                    ['label' => 'Enable YouTube Button', 'checked' => true, 'id' => 'show-youtube'],
                ],
            ],
            [
                'id' => 'seo',
                'title' => 'SEO & Website Metadata',
                'iconName' => 'FileText',
                'color' => '#10b981',
                'fields' => [
                    ['label' => 'Default Site Meta Title', 'type' => 'text', 'value' => 'Ahead Solar - Leading Renewable Energy Solutions', 'id' => 'meta-title'],
                    ['label' => 'Meta Description', 'type' => 'text', 'value' => 'Top-rated solar panel installation, battery storage, and maintenance for residential and commercial properties.', 'id' => 'meta-desc'],
                    ['label' => 'Keywords (Comma Separated)', 'type' => 'text', 'value' => 'solar panels, green energy, battery storage, renewable energy, solar installation', 'id' => 'meta-keywords'],
                ],
            ],
            [
                'id' => 'social',
                'title' => 'Social Media & External Links',
                'iconName' => 'Share2',
                'color' => '#ec4899',
                'fields' => [
                    ['label' => 'Facebook Page URL', 'type' => '', 'value' => 'https://www.facebook.com/profile.php?id=61591154285690', 'id' => 'social-fb'],
                    ['label' => 'Twitter / X Profile URL', 'type' => 'url', 'value' => '', 'id' => 'social-x'],
                    ['label' => 'LinkedIn Company URL', 'type' => 'url', 'value' => 'https://www.linkedin.com/company/ahead-solar-ltd/', 'id' => 'social-li'],
                    ['label' => 'Instagram Profile URL', 'type' => 'url', 'value' => '', 'id' => 'social-ig'],
                    ['label' => 'YouTube Channel URL', 'type' => 'url', 'value' => '', 'id' => 'social-youtube'],
                    ['label' => 'Google Map Embed URL', 'type' => 'url', 'value' => ' https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3393.9947761658013!2d90.39066177501897!3d23.87729687858403!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c5003133f351%3A0xc57cc5d4675738ff!2sAhead%20Center!5e1!3m2!1sen!2sbd!4v1784135178921!5m2!1sen!2sbd', 'id' => 'google-map'],
                ],
            ],
        ];

        Setting::updateOrCreate(
            ['id' => 1],
            ['sections' => $sections]
        );
    }

    private function seedContactQueries(): void
    {
        ContactQuery::updateOrCreate(
            ['email' => 'm.henderson@example.com'],
            [
                'name' => 'Michael Henderson',
                'email' => 'm.henderson@example.com',
                'phone' => '+1 (555) 234-5678',
                'subject' => 'Residential Solar Panel Installation Quote',
                'message' => 'Hello, I am looking to install a 10kW solar system on my rooftop in Austin. Could you please send me an estimated pricing sheet and available tax rebate info?',
                'status' => 'new',
                'created_at' => now()->subHours(3),
            ]
        );

        ContactQuery::updateOrCreate(
            ['email' => 'sarah.j@greencorp.org'],
            [
                'name' => 'Sarah Jenkins',
                'email' => 'sarah.j@greencorp.org',
                'phone' => '+1 (555) 876-5432',
                'subject' => 'Commercial Battery Storage Consultation',
                'message' => 'We operate a commercial facility and wish to integrate high-capacity Tesla Powerwall or commercial battery backups to mitigate power outages.',
                'status' => 'new',
                'created_at' => now()->subHours(26),
            ]
        );

        ContactQuery::updateOrCreate(
            ['email' => 'david.miller@techhub.io'],
            [
                'name' => 'David Miller',
                'email' => 'david.miller@techhub.io',
                'phone' => '+1 (555) 345-6789',
                'subject' => 'Maintenance & Inverter Diagnostics',
                'message' => 'Our inverter displays an error code E-04 since yesterday morning. We need an urgent technician dispatch.',
                'status' => 'replied',
                'notes' => 'Dispatched field technician John Doe for inspection on June 28.',
                'created_at' => now()->subHours(72),
            ]
        );

        ContactQuery::updateOrCreate(
            ['email' => 'elena.r@lifestyle.com'],
            [
                'name' => 'Elena Rostova',
                'email' => 'elena.r@lifestyle.com',
                'phone' => '+1 (555) 987-1234',
                'subject' => 'General Inquiry regarding Warranty',
                'message' => 'Hi! I wanted to check what brand of solar panels you supply and if they come with a 25-year performance warranty.',
                'status' => 'archived',
                'created_at' => now()->subHours(120),
            ]
        );
    }
}