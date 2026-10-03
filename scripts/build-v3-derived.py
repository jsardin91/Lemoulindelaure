"""Build small portal previews from Laure's unchanged original paintings."""
from pathlib import Path
from PIL import Image

ROOT = Path(__file__).resolve().parents[1]
ASSETS = ROOT / "wp-content/themes/lemoulindelaure-child/assets"
OUT = ASSETS / "brand-derived/v3"
OUT.mkdir(parents=True, exist_ok=True)
for animal in ("squirrel", "phoenix", "turtle", "butterfly"):
    source = ASSETS / f"art/painting-{animal}.webp"
    with Image.open(source) as image:
        image.thumbnail((720, 720), Image.Resampling.LANCZOS)
        target = OUT / f"{animal}-portal.webp"
        image.save(target, "WEBP", quality=79, method=6)
        print(f"{target.relative_to(ROOT)}: {image.width}x{image.height}, {target.stat().st_size // 1024} KB")
