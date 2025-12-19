<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application - {{ $application->name }}</title>
    <style>
        /* Ensure PDF pages are A4 for dompdf */
        @page {
            size: A4;
            margin: 10mm; /* adjust as needed for printer-safe margins */
        }
        @import url('https://fonts.googleapis.com/css2?family=Mukta+Malar:wght@400;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            font-family: 'Mukta Malar', 'DejaVu Sans', sans-serif;
            font-size: 15px;
            line-height: 1.4;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .header {
            text-align: center;
            margin-bottom: 8px;
            padding-bottom: 6px;
            border-bottom: 2px solid #dc2626;
        }

        .header h1 {
            color: #dc2626;
            font-size: 22px;
            margin-bottom: 3px;
            font-weight: bold;
            letter-spacing: 0.5px;
        }

        .header h2 {
            color: #6b7280;
            font-size: 14px;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .application-id {
            text-align: right;
            color: #666;
            font-size: 14px;
            margin-bottom: 8px;
            padding-bottom: 3px;
        }

        .content-wrapper {
            display: table;
            width: 100%;
            margin-bottom: 8px;
        }

        .left-column {
            display: table-cell;
            width: 68%;
            vertical-align: top;
            padding-right: 12px;
        }

        .right-column {
            display: table-cell;
            width: 32%;
            vertical-align: top;
            text-align: center;
        }

        .photo-box {
            border: 2px solid #dc2626;
            padding: 6px;
            background-color: transparent;
            border-radius: 4px;
            display: inline-block;
        }

        .photo-box img {
            width: 110px;
            height: 140px;
            object-fit: cover;
            border-radius: 2px;
            display: block;
        }

        .photo-label {
            margin-top: 4px;
            font-weight: bold;
            color: #dc2626;
            font-size: 10px;
            text-transform: uppercase;
        }

        .section {
            margin-bottom: 6px;
        }

        .section-title {
            background-color: #dc2626;
            color: white;
            padding: 4px 8px;
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 6px;
        }

        .info-grid {
            display: table;
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 8px;
            margin-bottom: 8px;
            border: none;
        }

        .info-row {
            display: table-row;
            border: none;
        }

        .info-label {
            display: table-cell;
            padding: 6px 8px;
            font-weight: bold;
            background-color: transparent;
            border: none;
            width: 38%;
            vertical-align: top;
            font-size: 13px;
            line-height: 1.6;
            color:rgb(14, 0, 0);
        }

        .info-value {
            display: table-cell;
            padding: 6px 8px;
            border: none;
            background-color: transparent;
            vertical-align: top;
            font-size: 16px;
            word-wrap: break-word;
            line-height: 1.6;
        }

        .status-badge {
            display: inline-block;
            padding: 3px 8px;
            border-radius: 8px;
            font-size: 9px;
            font-weight: bold;
        }

        .status-pending {
            background-color: #fef3c7;
            color: #92400e;
        }

        .status-approved {
            background-color: #d1fae5;
            color: #065f46;
        }

        .status-rejected {
            background-color: #fee2e2;
            color: #991b1b;
        }

        .document-section {
            margin-top: 10px;
            margin-bottom: 8px;
        }

        .document-box {
            text-align: center;
            padding: 12px;
            border: 2px solid #dc2626;
            background-color: #f9fafb;
            border-radius: 4px;
            min-height: 80px;
        }

        .document-box img {
            max-width: 100%;
            max-height: 200px;
            border: 1px solid #e5e7eb;
            border-radius: 2px;
            margin: 8px auto;
            display: block;
        }

        .document-label {
            font-weight: bold;
            color: #dc2626;
            font-size: 10px;
            margin-bottom: 8px;
            text-transform: uppercase;
        }

        .document-info {
            color: #666;
            margin: 8px 0;
            font-size: 9px;
            line-height: 1.5;
        }

        .document-file-name {
            color: #dc2626;
            font-weight: 600;
            font-size: 9px;
            margin: 5px 0;
        }

        .compact-section {
            margin-bottom: 5px;
        }

        .footer {
            margin-top: 6px;
            padding-top: 5px;
            border-top: 1px solid #e5e7eb;
            text-align: center;
            font-size: 9px;
            color: #666;
            line-height: 1.3;
        }

        /* PDF background and overlay */
        .pdf-bg {
            position: relative;
            /* Use absolute URL for Browsershot compatibility */
            background-image: url('{{ url("assets/images/images/app-form.jpg") }}');
            background-repeat: no-repeat;
            /* Background size to fit within A4 page accounting for margins */
            background-size: cover;
            background-position: center top;
            /* Make wrapper fit within A4 page with margins (10mm on each side) */
            width: 190mm; /* 210mm - 20mm (10mm margin on each side) */
            min-height: 277mm; /* 297mm - 20mm (10mm margin on top and bottom) */
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        .content-overlay {
            /* No background overlay - content appears directly on background */
            padding: 8mm;
            padding-top: 60mm;
            /* Constrain overlay to fit within the A4 area */
            width: 100%;
            min-height: 100%;
            box-sizing: border-box;
            color: #333;
        }

    </style>
</head>
<body>
    {{-- Tamil detection helper as Blade closure --}}
    @php
        $isTamil = function($text) {
            return preg_match('/[\x{0B80}-\x{0BFF}]/u', $text ?? '') === 1;
        };
        
        // Check if any application data contains Tamil text
        $hasTamilData = $isTamil($application->name ?? '') ||
                        $isTamil($application->address ?? '') ||
                        $isTamil($application->father_name ?? '') ||
                        $isTamil($application->mother_name ?? '') ||
                        $isTamil($application->spouse_name ?? '') ||
                        $isTamil($application->district->name_ta ?? '') ||
                        $isTamil($application->assembly->name_ta ?? '') ||
                        $isTamil($application->post->name_ta ?? '') ||
                        $isTamil($application->postingstage->name_ta ?? '') ||
                        $isTamil($application->subbody->name_ta ?? '');
        
        // Define labels based on language
        $labels = [
            'application_id' => $hasTamilData ? 'விண்ணப்ப எண்' : 'Application ID',
            'membership_id' => $hasTamilData ? 'உறுப்பினர் எண்' : 'Membership ID',
            'name' => $hasTamilData ? 'பெயர்' : 'Full Name',
            'mobile_number' => $hasTamilData ? 'மொபைல் எண்' : 'Mobile Number',
            'address' => $hasTamilData ? 'முகவரி' : 'Address',
            'voterid_no' => $hasTamilData ? 'வாக்காளர் அட்டை எண்' : 'Voter ID',
            'aadhar_no' => $hasTamilData ? 'ஆதார் எண்' : 'Aadhar Number',
            'district' => $hasTamilData ? 'மாவட்டம்' : 'District',
            'assembly' => $hasTamilData ? 'சட்டமன்ற தொகுதி' : 'Assembly',
            'post' => $hasTamilData ? 'பொறுப்பு நிலை' : 'Post Applied',
        ];
    @endphp

    <div class="pdf-bg">
        
        <div class="content-overlay">
            <div class="application-id">
                <strong>{{ $labels['application_id'] }}:</strong> {{ $application->id ?? 'N/A' }}
            </div>

            <div class="content-wrapper">
                <div class="left-column">
                    <!-- Personal Information Section -->
                    <div class="section">
                        <!-- <div class="section-title">Personal Information</div> -->
                        <div class="info-grid">
                            <div class="info-row">
                                <div class="info-label">{{ $labels['membership_id'] }}</div>
                                <div class="info-value">{{ $application->membership_id ?? 'N/A' }}</div>
                            </div>
                            <div class="info-row">
                                <div class="info-label">{{ $labels['name'] }}</div>
                                <div class="info-value">{{ $application->name ?? 'N/A' }}</div>
                            </div>
                            <div class="info-row">
                                <div class="info-label">{{ $labels['mobile_number'] }}</div>
                                <div class="info-value">{{ $application->mobile_number ?? 'N/A' }}</div>
                            </div>
                            <div class="info-row">
                                <div class="info-label">{{ $labels['address'] }}</div>
                                <div class="info-value">{{ $application->address ?? 'N/A' }}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Identification Section -->
                    <div class="section">
                        <!-- <div class="section-title">Identification Details</div> -->
                        <div class="info-grid">
                            <div class="info-row">
                                <div class="info-label">{{ $labels['voterid_no'] }}</div>
                                <div class="info-value">{{ $application->voterid_no ?? 'N/A' }}</div>
                            </div>
                            <div class="info-row">
                                <div class="info-label">{{ $labels['aadhar_no'] }}</div>
                                <div class="info-value">{{ $application->aadhar_no ?? 'N/A' }}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Location Section -->
                    <div class="section">
                        <!-- <div class="section-title">Location Details</div> -->
                        <div class="info-grid">
                            <div class="info-row">
                                <div class="info-label">{{ $labels['district'] }}</div>
                                <div class="info-value">{{ $hasTamilData ? ($application->district->name_ta ?? $application->district->name_en ?? 'N/A') : ($application->district->name_en ?? 'N/A') }}</div>
                            </div>
                            <div class="info-row">
                                <div class="info-label">{{ $labels['assembly'] }}</div>
                                <div class="info-value">{{ $hasTamilData ? ($application->assembly->name_ta ?? $application->assembly->name_en ?? 'N/A') : ($application->assembly->name_en ?? 'N/A') }}</div>
                            </div>
                            <div class="info-row">
                                <div class="info-label">{{ $labels['post'] }}</div>
                                <div class="info-value">{{ $hasTamilData ? ($application->post->name_ta ?? $application->post->name_en ?? 'N/A') : ($application->post->name_en ?? 'N/A') }}</div>
                            </div>
                        </div>
                    </div>

                    
                </div>

                <div class="right-column">
                    <div class="photo-box">
                        @if($application->photo_url)
                            <img src="{{ $application->photo_url }}" alt="Photo">
                        @else
                            <div style="width: 110px; height: 140px; background-color: #e5e7eb; display: flex; align-items: center; justify-content: center; border-radius: 2px;">
                                <span style="color: #999; font-size: 9px;">No Photo</span>
                            </div>
                        @endif
                        <!-- <div class="photo-label">Photograph</div> -->
                    </div>
                </div>
            </div>

            <!-- <div class="footer">
                <p>This is an officially generated document. Please keep it safe for future reference.</p>
                <p>Document generated on: {{ now()->format('d-m-Y H:i') }}</p>
            </div> -->
        </div>

    </div>
</body>
</html>