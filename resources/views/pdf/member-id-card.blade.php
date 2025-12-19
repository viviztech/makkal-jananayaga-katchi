@php
    $frontBg = url('assets/images/id_card/front.jpg');
    
    // Calculate age from date of birth
    $age = $member->dob ? \Carbon\Carbon::parse($member->dob)->age : null;
    
    // Format gender in Tamil
    $genderTamil = match($member->gender) {
        'Male' => 'ஆண்',
        'Female' => 'பெண்',
        'Other' => 'மற்றவை',
        default => ''
    };
    
    // Format joining date (using created_at)
    $joiningDate = $member->created_at ? $member->created_at->format('d.m.Y') : now()->format('d.m.Y');
    
    // Get photo path using accessor
    $photoPath = $member->photo_url;
@endphp
<!DOCTYPE html>
<html lang="ta">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member ID Card (Front) - {{ $member->name }}</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Mukta+Malar:wght@400;600;700&display=swap');
        
        /* Custom page size for CR80 ID card: 85.6mm x 53.98mm */
        @page {
            size: 85.6mm 53.98mm;
            margin: 0;
        }
        
        /* --- Universal Styles --- */
        body {
            font-family: 'Mukta Malar', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0;
            margin: 0;
            width: 85.6mm;
            height: 53.98mm;
        }

        /* --- Core ID Card Styles --- */
        /* Standard CR80 ID card dimensions: 8.56cm x 5.398cm */
        .id-card {
            width: 8.56cm;
            height: 5.398cm;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            border: 1px solid #cccccc;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            overflow: hidden;
            box-sizing: border-box;
            position: relative;
            background-image: url('{{ $frontBg }}');
        }

        /* Overlay for content on the front card */
        .id-card .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            background-color: rgba(255, 255, 255, 0);
        }

        .id-card .overlay .header-overlay {
            color: white;
            text-align: center;
            padding: 4px;
            font-size: 8pt;
            font-weight: bold;
            height: 10%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: transparent;
        }
        
        .id-card .overlay .content-overlay {
            display: flex;
            flex-grow: 1;
            padding: 5px;
            font-size: 7pt;
            height: 78%;
            background-color: transparent;
            align-items: center;
        }

        .id-card .overlay .info-left {
            flex: 2;
            padding-left: 15px;
            color: #000;
        }
        
        .id-card .overlay .info-left p {
            margin: 2px 0;
            font-weight: bold;
            font-family: 'Mukta Malar', sans-serif;
        }
        
        .id-card .overlay .info-left p span {
            font-weight: normal;
            margin-left: 5px;
        }

        .id-card .overlay .photo-right {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding-right: 15px;
        }

        .id-card .overlay .photo-right img {
            width: 2.0cm;
            height: 2.0cm;
            border: 1px solid #ddd;
            object-fit: cover;
            background-color: #f9f9f9;
        }
        
        .id-card .overlay .photo-right .signature-text {
            font-size: 6pt;
            margin-top: 2px;
            color: #555;
        }

        .id-card .overlay .footer-overlay {
            color: white;
            text-align: center;
            padding: 3px;
            font-size: 6pt;
            height: 12%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: transparent;
        }

        /* --- Print-Specific Styles --- */
        @media print {
            body {
                background-color: #ffffff;
                padding: 0;
                margin: 0;
            }
            .id-card {
                box-shadow: none;
                border: 1px solid #000000;
                page-break-inside: avoid;
            }
            
            /* Crucial for printing background images and colors */
            .id-card {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
                color-adjust: exact;
            }
        }
    </style>
</head>
<body>
    <div class="id-card">
        <div class="overlay">
            <div class="header-overlay">
                <!-- Header content if needed -->
            </div>
            
            <div class="content-overlay">
                <div class="info-left">
                    <p>பெயர்: <span>{{ $member->name }}</span></p>
                    <p>த/பெ: <span>{{ $member->father_name ?? 'N/A' }}</span></p>
                    <p>வயது/பாலினம்: <span>@if($age){{ $age }} / @endif{{ $genderTamil }}</span></p>
                    <p>உ.இ.தேதி: <span>{{ $joiningDate }}</span></p>
                    <p>தொகுதி: <span>{{ $member->assembly->name ?? 'N/A' }}</span></p>
                    <p>மாவட்டம்: <span>{{ $member->district->name ?? 'N/A' }}</span></p>
                    <p>உறுப்பினர் எண்: <span>{{ $member->member_no ?? 'N/A' }}</span></p>
                </div>
                <div class="photo-right">
                    @if($photoPath)
                        <img src="{{ $photoPath }}" alt="Member Photo">
                    @else
                        <div style="width: 2.0cm; height: 2.0cm; background: #e0e0e0; display: flex; align-items: center; justify-content: center; font-size: 6pt; color: #666; border: 1px solid #ddd;">
                            புகைப்படம் இல்லை
                        </div>
                    @endif
                </div>
            </div>
            
            <div class="footer-overlay">
                <!-- Footer content if needed -->
            </div>
        </div>
    </div>
</body>
</html>

