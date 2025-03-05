#!/usr/bin/env python3

import re
import urllib.request


def split_classes(content):
    classes = re.split(r"(?m)^class ", content)
    for class_content in classes[1:]:
        class_content = class_content.replace(" extends Exception", " extends \\Exception").strip()
        class_name = re.match(r"(\w+)", class_content).group(1)
        file_path = f"src/{class_name}.php"
        with open(file_path, "w") as f:
            f.write(f"<?php\n\nnamespace Lightspeed;\n\nclass {class_content}\n")
        print(f"Split: {class_name} → {file_path}")


if __name__ == "__main__":
    url = "https://raw.githubusercontent.com/SEOshop/API-PHP-Client/refs/heads/master/src/WebshopappApiClient.php"
    with urllib.request.urlopen(url) as response:
        split_classes(response.read().decode("utf-8"))
        print("Done!")
