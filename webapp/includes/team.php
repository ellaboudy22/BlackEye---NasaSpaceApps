<style>

.team-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 2rem;
    margin-bottom: 4rem;
}

.team-member {
    background: rgba(17, 24, 39, 0.8);
    border: 1px solid rgba(107, 70, 193, 0.2);
    border-radius: 16px;
    padding: 2rem;
    transition: var(--transition-normal);
    backdrop-filter: blur(10px);
    text-align: center;
}

.team-member:hover {
    transform: translateY(-8px);
    border-color: var(--nebula-purple);
    box-shadow: 0 20px 40px rgba(107, 70, 193, 0.2);
}

.member-photo {
    margin-bottom: 1.5rem;
    display: flex;
    justify-content: center;
}

.member-photo img {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    object-fit: cover;
    border: 3px solid rgba(107, 70, 193, 0.3);
    transition: var(--transition-normal);
    margin: 0 auto;
    display: block;
}

.photo-placeholder {
    width: 120px;
    height: 120px;
    background: var(--nebula-gradient);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
    transition: var(--transition-normal);
}

.photo-placeholder svg {
    width: 60px;
    height: 60px;
    color: var(--star-white);
}

.team-member:hover .member-photo img,
.team-member:hover .photo-placeholder {
    transform: scale(1.1);
    box-shadow: 0 10px 25px rgba(107, 70, 193, 0.3);
    border-color: var(--nebula-purple);
}

.member-name {
    font-family: var(--font-primary);
    font-size: 1.4rem;
    margin-bottom: 0.5rem;
    color: var(--star-white);
}

.member-role {
    color: var(--stellar-blue);
    font-weight: 600;
    margin-bottom: 1rem;
    font-size: 1rem;
}

.member-bio {
    color: var(--star-dim);
    line-height: 1.6;
    margin-bottom: 1.5rem;
    font-size: 0.95rem;
}




    </style>
<?php
// Team data structure
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
        'name' => 'Eyad Shawky',
        'role' => 'Backend Developer',
        'bio' => 'Developing server-side architecture and APIs for the BlackEye platform. Expert in Python, Flask/FastAPI, database design, RESTful APIs, and building scalable backend systems for ML model integration.',
        'image' => 'eyad-shawky.jpeg'
    ],
    [
        'name' => 'Yahia Awad',
        'role' => 'Data Engineer',
        'bio' => 'Building data pipelines and processing workflows for NASA datasets. Expert in ETL processes, data transformation, big data tools, and preparing astronomical datasets for machine learning applications.',
        'image' => 'yahia-awad.jpeg'
    ],
    [
        'name' => 'Ahmed Khaled',
        'role' => 'DevOps & Cloud Engineer',
        'bio' => 'Managing deployment infrastructure and cloud operations. Expert in Docker, Kubernetes, CI/CD pipelines, cloud platforms (AWS/Azure), monitoring, and ensuring reliable production deployment of AI systems.',
        'image' => 'ahmed-khaled.jpeg'
    ],
    [
        'name' => 'Yassin Yasser',
        'role' => 'UI/UX Designer',
        'bio' => 'Designing user experiences and visual interfaces for the BlackEye platform. Expert in Figma, user research, wireframing, prototyping, and creating beautiful, accessible designs for scientific applications.',
        'image' => 'yassin-yasser.jpeg'
    ]
];
?>

<section id="team" class="section">
        <div class="container">
            <h2 class="section-title">Our Team</h2>
            <p class="subtitle">
                A passionate group of scientists, engineers, and space enthusiasts working together 
                to advance exoplanet discovery through cutting-edge AI technology.
            </p>
            <div class="team-grid">
                <?php foreach ($team_members as $member): ?>
                <div class="team-member">
                    <div class="member-photo">
                        <?php 
                        $image_path = "assets/images/team/" . $member['image'];
                        $full_image_path = __DIR__ . "/../../" . $image_path;
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
                    <div class="member-info">
                        <h3 class="member-name"><?php echo htmlspecialchars($member['name']); ?></h3>
                        <p class="member-role"><?php echo htmlspecialchars($member['role']); ?></p>
                        <p class="member-bio"><?php echo htmlspecialchars($member['bio']); ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

        </div>
    </section>