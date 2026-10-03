"""Build portal previews and a transparent cutout of the supplied Butterfly door."""
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

# The new Butterfly WebP from main has an opaque dark surround. The Ocean
# door has the same silhouette and a transparent alpha channel. Reuse only
# that alpha shape, preserving the Butterfly artwork and both source files.
with Image.open(ASSETS / "doors/door-butterfly.webp") as butterfly, Image.open(ASSETS / "doors/door-ocean.webp") as ocean:
    cutout = butterfly.convert("RGBA")
    if cutout.size != ocean.size:
        raise ValueError("Butterfly and Ocean doors must have matching dimensions")
    cutout.putalpha(ocean.getchannel("A"))
    target = OUT / "door-butterfly-cutout.webp"
    cutout.save(target, "WEBP", quality=82, method=6)
    print(f"{target.relative_to(ROOT)}: {cutout.width}x{cutout.height}, {target.stat().st_size // 1024} KB")
