#!/usr/bin/env python3
"""
Simple favicon creator without external dependencies
Creates a ballot box icon for politics
"""
import struct
import zlib

def create_png(width, height, data):
    """Create a PNG file from raw RGBA data"""
    def png_chunk(chunk_type, data):
        chunk_data = chunk_type + data
        crc = zlib.crc32(chunk_data) & 0xffffffff
        return struct.pack('>I', len(data)) + chunk_data + struct.pack('>I', crc)

    # PNG signature
    png = b'\x89PNG\r\n\x1a\n'

    # IHDR chunk
    ihdr = struct.pack('>IIBBBBB', width, height, 8, 6, 0, 0, 0)
    png += png_chunk(b'IHDR', ihdr)

    # IDAT chunk - compress the image data
    raw = b''
    for row in range(height):
        raw += b'\x00'  # Filter type
        for col in range(width):
            idx = (row * width + col) * 4
            raw += data[idx:idx+4]

    compressed = zlib.compress(raw, 9)
    png += png_chunk(b'IDAT', compressed)

    # IEND chunk
    png += png_chunk(b'IEND', b'')

    return png

def draw_circle(data, width, height, cx, cy, r, color):
    """Draw a filled circle"""
    for y in range(max(0, cy-r), min(height, cy+r+1)):
        for x in range(max(0, cx-r), min(width, cx+r+1)):
            dx = x - cx
            dy = y - cy
            if dx*dx + dy*dy <= r*r:
                idx = (y * width + x) * 4
                data[idx:idx+4] = color

def draw_rect(data, width, height, x, y, w, h, color):
    """Draw a filled rectangle"""
    for py in range(max(0, y), min(height, y+h)):
        for px in range(max(0, x), min(width, x+w)):
            idx = (py * width + px) * 4
            data[idx:idx+4] = color

def create_ballot_icon(size):
    """Create a ballot box icon"""
    data = bytearray([255, 255, 255, 0] * (size * size))  # Transparent background

    # Red background circle
    draw_circle(data, size, size, size//2, size//2, size//2, bytes([220, 38, 38, 255]))

    # Scale factor
    s = size / 512
    cx, cy = size // 2, size // 2

    # White ballot box body
    box_w, box_h = int(200*s), int(140*s)
    box_x, box_y = int(cx - 100*s), int(cy - 40*s)
    draw_rect(data, size, size, box_x, box_y, box_w, box_h, bytes([255, 255, 255, 255]))

    # Ballot box slot
    slot_w, slot_h = int(160*s), int(25*s)
    slot_x, slot_y = int(cx - 80*s), int(cy - 60*s)
    draw_rect(data, size, size, slot_x, slot_y, slot_w, slot_h, bytes([255, 255, 255, 255]))

    # Slot opening (dark)
    opening_w, opening_h = int(150*s), int(15*s)
    opening_x, opening_y = int(cx - 75*s), int(cy - 55*s)
    draw_rect(data, size, size, opening_x, opening_y, opening_w, opening_h, bytes([30, 41, 59, 255]))

    # Ballot paper
    paper_w, paper_h = int(50*s), int(60*s)
    paper_x, paper_y = int(cx - 25*s), int(cy - 80*s)
    draw_rect(data, size, size, paper_x, paper_y, paper_w, paper_h, bytes([255, 249, 230, 255]))

    # Small circle decorations on box
    decor_r = int(12*s)
    draw_circle(data, size, size, int(cx - 70*s), int(cy + 70*s), decor_r, bytes([220, 38, 38, 255]))
    draw_circle(data, size, size, int(cx + 70*s), int(cy + 70*s), decor_r, bytes([220, 38, 38, 255]))

    return create_png(size, size, data)

# Create favicons in different sizes
sizes = {
    'favicon-16x16.png': 16,
    'favicon-32x32.png': 32,
    'apple-touch-icon.png': 180,
    'android-chrome-192x192.png': 192,
    'android-chrome-512x512.png': 512,
}

output_dir = '/Users/ganeshthangavel/Sites/mjk-party/public/assets/images/favicons/'

for filename, size in sizes.items():
    print(f'Creating {filename} ({size}x{size})...')
    png_data = create_ballot_icon(size)
    with open(output_dir + filename, 'wb') as f:
        f.write(png_data)

# Create .ico file (using 32x32)
ico_data = create_ballot_icon(32)
with open(output_dir + 'favicon.ico', 'wb') as f:
    # ICO header
    f.write(struct.pack('<HHH', 0, 1, 1))  # Reserved, Type, Count
    # ICO directory entry
    f.write(struct.pack('<BBBBHHII', 32, 32, 0, 0, 1, 32, len(ico_data), 22))
    # PNG data
    f.write(ico_data)

print('All favicons created successfully!')
