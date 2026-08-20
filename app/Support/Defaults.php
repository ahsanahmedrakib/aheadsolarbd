<?php

namespace App\Support;

/**
 * Fallback (default) content data for the public site.
 *
 * These mirror the original Next.js "DEFAULT_*" data files. They are only
 * used when no data has been stored in the database by an admin (or approved
 * by an admin, in the case of reviews). Once real data exists in the DB, the
 * database is the source of truth.
 */
class Defaults
{
    public static function services(): array
    {
        return [
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
    }

    public static function projects(): array
    {
        return [
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
    }

    public static function reviews(): array
    {
        return [
            ['name' => 'Cameron Williamson', 'role' => 'Home Owner', 'rating' => 5, 'quote' => 'Switching to solar was one of the best decisions we made. The installation was seamless and our electricity bills dropped significantly within the first month.', 'created_at' => '2026-06-15 10:00:00'],
            ['name' => 'Leslie Alexander', 'role' => 'Retail Store Owner', 'rating' => 5, 'quote' => 'The team provided a solar solution for our residential complex. Professional approach, transparent pricing, and excellent after-sales support.', 'created_at' => '2026-06-10 08:30:00'],
            ['name' => 'Robert Fox', 'role' => 'Business Owner', 'rating' => 4, 'quote' => 'Great experience from start to finish. The consultation was thorough, installation was on time, and the system has been performing perfectly. Great experience from start to finish. The consultation was thorough, installation was on time, and the system has been performing perfectly. Great experience from start to finish. The consultation was thorough, installation was on time, and the system has been performing perfectly. Great experience from start to finish. The consultation was thorough, installation was on time, and the system has been performing perfectly.', 'created_at' => '2026-05-20 14:15:00'],
            ['name' => 'Sarah Mitchell', 'role' => 'Home Owner', 'rating' => 5, 'quote' => 'Our energy costs have been cut by over 60%. The team was professional and completed the installation ahead of schedule. Highly recommend their services.', 'created_at' => '2026-05-12 09:45:00'],
            ['name' => 'James Cooper', 'role' => 'Property Manager', 'rating' => 5, 'quote' => 'We\'ve installed solar panels on three of our properties. Each time the process was smooth and the results exceeded our expectations. Outstanding value.', 'created_at' => '2026-04-28 11:20:00'],
            ['name' => 'Emily Chen', 'role' => 'Home Owner', 'rating' => 4, 'quote' => 'The consultation was very informative. They helped us choose the right system for our home and the installation was completed in just one day.', 'created_at' => '2026-04-15 16:00:00'],
        ];
    }

    public static function team(): array
    {
        return [
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
    }

    public static function heroSlides(): array
    {
        return [
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
    }
}