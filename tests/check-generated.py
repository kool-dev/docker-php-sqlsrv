import json
from pathlib import Path


template = Path("template/Dockerfile.blade.php").read_text()
for build in json.loads(Path("fwd-template.json").read_text())["builds"]:
    expected = template.replace("{{ $from }}", build["data"]["from"])
    path = Path(build["name"]) / "Dockerfile"
    if path.read_text() != expected:
        raise SystemExit(f"{path} differs from its template; run kool run template")
print("Generated Dockerfiles match the template")
