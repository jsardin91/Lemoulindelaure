"""Derive site assets from the supplied client artwork. Requires Pillow."""

from pathlib import Path
from PIL import Image

ROOT = Path(__file__).resolve().parents[1]
SOURCE = ROOT / "design/brand/source"
DOORS = ROOT / "design/brand/doors"
OUT = ROOT / "wp-content/themes/lemoulindelaure-child/assets"


def logo_crop(box, size, name, transparent=False):
    image = Image.open(SOURCE / "logo-client-original.jpeg").convert("RGB").crop(box)
    if transparent:
        # Remove only the very light cream paper around the printed mark.
        # The immutable original remains available for exact color fidelity.
        image = image.convert("RGBA")
        pixels = image.load()
        for y in range(image.height):
            for x in range(image.width):
                r, g, b, _ = pixels[x, y]
                d = max(abs(r - 253), abs(g - 249), abs(b - 240))
                alpha = max(0, min(255, int((d - 13) * 255 / 20)))
                pixels[x, y] = (r, g, b, alpha)
    image.thumbnail(size, Image.Resampling.LANCZOS)
    image.save(OUT / "logo" / name, optimize=True)


logo_crop((40, 100, 1210, 1150), (1200, 1200), "logo-complet-creme.webp")
logo_crop((40, 100, 1210, 1150), (1200, 1200), "logo-complet-transparent.png", True)
logo_crop((245, 105, 1010, 800), (700, 700), "embleme-transparent.png", True)
logo_crop((60, 795, 1185, 975), (1120, 180), "signature-transparent.png", True)
logo_crop((220, 980, 1040, 1130), (820, 150), "devise-transparent.png", True)

mark = Image.open(OUT / "logo/embleme-transparent.png")
signature = Image.open(OUT / "logo/signature-transparent.png")
mark_small = mark.copy()
mark_small.thumbnail((340, 340), Image.Resampling.LANCZOS)
signature_small = signature.copy()
signature_small.thumbnail((810, 160), Image.Resampling.LANCZOS)
horizontal = Image.new("RGBA", (1200, 380), (0, 0, 0, 0))
horizontal.alpha_composite(mark_small, (15, (380 - mark_small.height) // 2))
horizontal.alpha_composite(signature_small, (370, (380 - signature_small.height) // 2))
horizontal.save(OUT / "logo/logo-horizontal-transparent.png", optimize=True)

for size in (32, 180, 512):
    square = Image.new("RGBA", (size, size), (0, 0, 0, 0))
    scaled = mark.copy()
    scaled.thumbnail((size, size), Image.Resampling.LANCZOS)
    square.alpha_composite(scaled, ((size - scaled.width) // 2, (size - scaled.height) // 2))
    square.save(
        OUT / "logo" / f"icone-{size}.png", optimize=True
    )

for name in ("butterfly", "turtle", "squirrel", "phoenix"):
    painting = Image.open(SOURCE / f"painting-{name}.jpeg").convert("RGB")
    painting.thumbnail((1440, 1440), Image.Resampling.LANCZOS)
    painting.save(OUT / "art" / f"painting-{name}.webp", "WEBP", quality=83, method=6)

for name in ("passage", "ocean", "forest", "phoenix"):
    door = Image.open(DOORS / f"door-{name}-master.png").convert("RGBA")
    door.thumbnail((512, 768), Image.Resampling.LANCZOS)
    door.save(OUT / "doors" / f"door-{name}.webp", "WEBP", quality=82, method=6)
