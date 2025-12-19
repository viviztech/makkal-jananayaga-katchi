@php
    $frontBg = url('assets/images/id_card/front.jpg');
    $backBg = url('assets/images/id_card/back.jpg');
    
    // Calculate age from date of birth
    $age = $member->dob ? \Carbon\Carbon::parse($member->dob)->age : null;
    
    // Format joining date (using created_at)
    $joiningDate = $member->created_at ? $member->created_at->format('d.m.Y') : now()->format('d.m.Y');
    
    // Get photo path using accessor
    $photoPath = $member->photo_url;
    
    // Fixed English labels
    $labels = [
        'name' => 'Name',
        'father_name' => 'Father Name',
        'age_gender' => 'Age / Gender',
        'join_date' => 'Join Date',
        'assembly' => 'Assembly',
        'district' => 'District',
        'membership_id' => 'Membership ID',
    ];
    
    // Get values
    $nameValue = $member->name ?? 'N/A';
    $fatherNameValue = $member->father_name ?? 'N/A';
    $ageGenderValue = ($age ? $age . ' / ' : '') . ($member->gender ?? '');
    $joinDateValue = $joiningDate;
    $assemblyValue = $member->assembly->name ?? 'N/A';
    $districtValue = $member->district->name ?? 'N/A';
    $membershipIdValue = $member->member_no ?? 'N/A';
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member ID Card (Full) - {{ $member->name }}</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Mukta+Malar:wght@400;600;700&display=swap');
        
        /* A4 page with two cards side by side */
        @page {
            size: A4;
            margin: 0;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Mukta Malar', 'DejaVu Sans', sans-serif;
            margin: 0;
            padding: 0;
        }

        .page-container {
            width: 210mm;
            height: 297mm;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 10mm;
            padding: 23mm 10mm 10mm 17mm;
        }

        .id-card {
            width: 85.6mm;
            height: 53.98mm;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            position: relative;
            overflow: hidden;
            border: 1px solid #ccc;
        }

        /* Front Card */
        .front-card {
            background-image: url('{{ $frontBg }}');
        }

        .content-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            padding: 13mm 4mm 4mm 9mm;
        }

        .left-content {
            flex: 1.2;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding-right: 3mm;
            padding-top: 2mm;
        }

        .field-row {
            margin-bottom: 1.2mm;
            font-size: 7pt;
            line-height: 1.0;
        }

        .field-label {
            font-weight: bold;
            display: inline-block;
            min-width: 25mm;
            color: #000;
        }

        .field-value {
            color: #000;
            font-weight: normal;
        }

        .right-photo {
            flex: 0.8;
            display: flex;
            align-items: center;
            justify-content: center;
            padding-left: 4mm;
        }

        .photo-container {
            width: 16mm;
            height: 22mm;
            border: 2px solid #dc2626;
            border-radius: 3px;
            overflow: hidden;
            background-color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .photo-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .photo-placeholder {
            width: 100%;
            height: 100%;
            background-color: #f3f4f6;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 6pt;
            color: #666;
            text-align: center;
            padding: 2mm;
        }

        /* Back Card */
        .back-card {
            background-image: url('{{ $backBg }}');
        }

        @media print {
            .id-card {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
                color-adjust: exact;
            }
        }
    </style>
</head>
<body>
    <div class="page-container">
        <!-- Front Side -->
        <div class="id-card front-card">
            <div class="content-overlay">
                <div class="left-content">
                    <div class="field-row">
                        <span class="field-label">{{ $labels['name'] }}:</span>
                        <span class="field-value">{{ $nameValue }}</span>
                    </div>
                    <div class="field-row">
                        <span class="field-label">{{ $labels['father_name'] }}:</span>
                        <span class="field-value">{{ $fatherNameValue }}</span>
                    </div>
                    <div class="field-row">
                        <span class="field-label">{{ $labels['age_gender'] }}:</span>
                        <span class="field-value">{{ $ageGenderValue }}</span>
                    </div>
                    <div class="field-row">
                        <span class="field-label">{{ $labels['join_date'] }}:</span>
                        <span class="field-value">{{ $joinDateValue }}</span>
                    </div>
                    <div class="field-row">
                        <span class="field-label">{{ $labels['assembly'] }}:</span>
                        <span class="field-value">{{ $assemblyValue }}</span>
                    </div>
                    <div class="field-row">
                        <span class="field-label">{{ $labels['district'] }}:</span>
                        <span class="field-value">{{ $districtValue }}</span>
                    </div>
                    <div class="field-row">
                        <span class="field-label">{{ $labels['membership_id'] }}:</span>
                        <span class="field-value">{{ $membershipIdValue }}</span>
                    </div>
                </div>
                <div class="right-photo">
                    <div class="photo-container">
                        @if($photoPath)
                            <img src="{{ $photoPath }}" alt="Member Photo">
                        @else
                            <div class="photo-placeholder">
                                No Photo
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Back Side -->
        <div class="id-card back-card">
            <!-- Back side only shows background image -->
        </div>
    </div>
</body>
</html>
