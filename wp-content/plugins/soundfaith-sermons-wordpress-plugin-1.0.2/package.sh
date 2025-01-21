#!/bin/sh -e

VERSION=$1

if ! [[ $VERSION =~ ^[0-9]+\.[0-9]+\.[0-9]+$ ]]; then
	echo "Usage: $0 VERSION"
	echo "VERSION should be in the form major.minor.patch"
	exit 1
fi

perl -pi -e "s/Stable tag: .*/Stable tag: $VERSION/g" readme.txt
ZIP_FILE_NAME=soundfaith-sermons-wordpress-plugin-$VERSION.zip

zip -rFS $ZIP_FILE_NAME . \
-x *.git* \
-x .dockerignore \
-x .DS_Store \
-x .gitignore \
-x docker-compose.yml \
-x Dockerfile \
-x README.md \
-x $ZIP_FILE_NAME
