bunx @tailwindcss/cli -i ./style.css -o ./themes/village-of-round-lake-park/style.css -m

bun --eval '
const fs = require("fs");
const path = "themes/village-of-round-lake-park/style.css";
const header = `/*
Theme Name: Village of Round Lake Park
Author: Justin White
Description: Village of Round Lake Park WordPress theme.
Version: 1.0
*/

`;
const content = fs.readFileSync(path, "utf8");
fs.writeFileSync(path, header + content);
'