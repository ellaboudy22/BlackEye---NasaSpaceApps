<?php
$team_members = [
    [
        'name' => 'Moaz Ellaboudy',
        'role' => 'Team Lead & AI/ML Engineer',
        'bio' => 'Leading the team and developing machine learning models for exoplanet classification. Expert in deep learning, model training, feature engineering, and AI algorithm optimization for astronomical data analysis.',
        'image' => 'moaz-ellaboudy.jpeg'
    ],
    [
        'name' => 'Adam Ezzat',
        'role' => 'Frontend Developer',
        'bio' => 'Building responsive and interactive user interfaces for the BlackEye platform. Expert in modern JavaScript frameworks, React, responsive design, and creating intuitive web experiences for data visualization.',
        'image' => 'adam-ezzat.jpeg'
    ],
    [
        'name' => 'Yahia Awad',
        'role' => 'Hardware Engineer',
        'bio' => 'Designing and implementing hardware solutions for astronomical data processing systems. Expert in embedded systems, FPGA programming, signal processing hardware, and optimizing computational systems for real-time data analysis.',
        'image' => 'yahia-awad.jpeg'
    ],
    [
        'name' => 'Karim Soliman',
        'role' => 'Hardware Engineer',
        'bio' => 'Developing specialized hardware components for exoplanet detection systems. Expert in circuit design, sensor integration, data acquisition systems, and hardware optimization for space-based applications.',
        'image' => 'karim-soliman.jpeg'
    ],
    [
        'name' => 'Batool Saleh',
        'role' => 'Researcher',
        'bio' => 'Conducting scientific research and analysis for exoplanet detection methodologies. Expert in astronomical data analysis, statistical modeling, research methodology, and contributing to scientific publications in exoplanet research.',
        'image' => 'batool-saleh.jpeg'
    ]
];
?>

<section id="team" class="section">
        <div class="container">
            <h2 class="section-title">Our Team</h2>
            <p class="section-subtitle">
                A passionate group of scientists and engineers working together 
                to advance exoplanet discovery through cutting-edge AI technology.
            </p>
            <div class="cards-grid">
                <?php foreach ($team_members as $member): ?>
                <div class="card team-member">
                    <div class="member-photo">
                        <?php
                        $image_path = "assets/images/team/" . $member['image'];
                        $full_image_path = __DIR__ . "/../" . $image_path;
                        if (file_exists($full_image_path)): ?>
                            <img src="<?php echo $image_path; ?>" alt="<?php echo htmlspecialchars($member['name']); ?>" loading="lazy">
                        <?php else: ?>
                            <div class="photo-placeholder">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                                    <circle cx="12" cy="7" r="4"/>
                                </svg>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="card-content">
                        <h3 class="card-title"><?php echo htmlspecialchars($member['name']); ?></h3>
                        <p class="member-role"><?php echo htmlspecialchars($member['role']); ?></p>
                        <p class="card-description"><?php echo htmlspecialchars($member['bio']); ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

        </div>
    </section>