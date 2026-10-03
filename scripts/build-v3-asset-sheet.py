"""Create an ignored contact sheet for V3 visual asset inspection."""
from pathlib import Path
from PIL import Image, ImageDraw

ROOT = Path(__file__).resolve().parents[1]
ASSETS = ROOT / "wp-content/themes/lemoulindelaure-child/assets"
FILES = [
    *(f"art/painting-{name}.webp" for name in ("squirrel", "phoenix", "turtle", "butterfly")),
    *(f"art/painting-{name}-display.webp" for name in ("squirrel", "phoenix", "turtle", "butterfly")),
    *(f"doors/door-{name}.webp" for name in ("forest", "phoenix", "ocean", "passage")),
    *(f"logo/{name}" for name in (
        "logo-horizontal-transparent.png", "logo-complet-transparent.png",
        "logo-complet-creme.webp", "embleme-transparent.png",
        "signature-transparent.png", "devise-transparent.png",
        "icone-32.png", "icone-180.png", "icone-512.png",
    )),
]
WIDTH, HEIGHT, GAP, LABEL = 300, 310, 20, 42
sheet = Image.new("RGB", (4 * WIDTH + 5 * GAP, 6 * (HEIGHT + LABEL) + 7 * GAP), "#eeeae0")
draw = ImageDraw.Draw(sheet)
for index, filename in enumerate(FILES):
    image = Image.open(ASSETS / filename).convert("RGBA")
    image.thumbnail((WIDTH - 25, HEIGHT - 25))
    x = GAP + index % 4 * (WIDTH + GAP)
    y = GAP + index // 4 * (HEIGHT + LABEL + GAP)
    background = Image.new("RGBA", (WIDTH, HEIGHT), "#faf7ef")
    for row in range(0, HEIGHT, 24):
        for col in range(0, WIDTH, 24):
            if (row // 24 + col // 24) % 2:
                draw.rectangle((x + col, y + row, x + col + 23, y + row + 23), fill="#e9e5db")
    sheet.paste(background, (x, y), background)
    sheet.paste(image, (x + (WIDTH - image.width) // 2, y + (HEIGHT - image.height) // 2), image)
    draw.text((x, y + HEIGHT + 5), filename, fill="#173f54")
output = ROOT / ".local-wp/v3-asset-sheet.png"
output.parent.mkdir(exist_ok=True)
sheet.save(output)
print(output)
