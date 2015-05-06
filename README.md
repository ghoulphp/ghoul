`ghoul`
=====
###### Not yet working

ghoul is a "native" filesystem abstraction library for PHP. It is not your grandmother's abstraction library.

### Installation
```sh
$ composer require ghoulphp/ghoul
$ composer require ghoulphp/[adapter-name]
```

### Usage
```php
(new ghoul)
    ->with(new MemoryAdapter()) // Attaches a MemoryAdapter to the ghoul instance
    ->bind(); // Filesystem functions now point to this ghoul

file_put_contents("file.txt", "Hello World!"); // Stored in memory
echo file_get_contents("file.txt"); // Prints "Hello World"

ghoul::halt(true); // Halts and cleans up the active ghoul
```

### Binding
ghoul binding is really simple. Only one instance can be bound at a time and if another instance tries to bind over it, an exception will be thrown. ghoul allows you to manage binding statically or through a ghoul object. Here are some examples.

```php
$g = new ghoul; // NOT BOUND | NOT STORED
$g->bind(); // BOUND | STORED
$g->release(); // NOT BOUND | STORED
ghoul::resume(); // BOUND | STORED
ghoul::halt(true); // NOT BOUND | NOT STORED
```

The two static method control the currently stored object. It is impossible to statically bind a ghoul, you can only halt or resume an already stored instance.

#### Note
When you release or halt a release ghoul, a reference is still held until another one is bound over it. This will prevent the object from being garbage collected. If you want to ensure speedy garbage collection pass `true` as the first argument to either method. Doing this means you can't call `ghoul::resume()` method, you will be able to call `ghoul->bind()` and bind from scratch/

### Compatibility with flysystem
flysystem by the PHP league is a far better abstraction library and is backed by many more contributors and experience. For this reason ghoul is built as an extension to it and not as a standalone library. ghoul depends on flysystem and can use all flysystem adapters out of the box. The issue with these adapters is they don't expose all the features needed by ghoul. For this reason ghoul has its own adapter system which extends flysystem's. ghoul adapters allow you to use all filesystem functions.

### What does this do?
ghoul overrides built-in filesystem methods, so you don't need to change any code.

### But that is evil, what happened to proper code standards?
You're using PHP.

### Can I turn off goul?
Yes. But that wouldn't be fun. 

### What methods are currently supported?

- [ ] basename — Returns trailing name component of path
- [ ] chgrp — Changes file group
- [ ] chmod — Changes file mode
- [ ] chown — Changes file owner
- [ ] clearstatcache — Clears file status cache
- [ ] copy — Copies file
- [ ] delete — See unlink or unset
- [ ] dirname — Returns parent directory's path
- [ ] disk_free_space — Returns available space on filesystem or disk partition
- [ ] disk_total_space — Returns the total size of a filesystem or disk partition
- [ ] diskfreespace — Alias of disk_free_space
- [ ] fclose — Closes an open file pointer
- [ ] feof — Tests for end-of-file on a file pointer
- [ ] fflush — Flushes the output to a file
- [ ] fgetc — Gets character from file pointer
- [ ] fgetcsv — Gets line from file pointer and parse for CSV fields
- [ ] fgets — Gets line from file pointer
- [ ] fgetss — Gets line from file pointer and strip HTML tags
- [ ] file_exists — Checks whether a file or directory exists
- [ ] file_get_contents — Reads entire file into a string
- [ ] file_put_contents — Write a string to a file
- [ ] file — Reads entire file into an array
- [ ] fileatime — Gets last access time of file
- [ ] filectime — Gets inode change time of file
- [ ] filegroup — Gets file group
- [ ] fileinode — Gets file inode
- [ ] filemtime — Gets file modification time
- [ ] fileowner — Gets file owner
- [ ] fileperms — Gets file permissions
- [ ] filesize — Gets file size
- [ ] filetype — Gets file type
- [ ] flock — Portable advisory file locking
- [ ] fnmatch — Match filename against a pattern
- [ ] fopen — Opens file or URL
- [ ] fpassthru — Output all remaining data on a file pointer
- [ ] fputcsv — Format line as CSV and write to file pointer
- [ ] fputs — Alias of fwrite
- [ ] fread — Binary-safe file read
- [ ] fscanf — Parses input from a file according to a format
- [ ] fseek — Seeks on a file pointer
- [ ] fstat — Gets information about a file using an open file pointer
- [ ] ftell — Returns the current position of the file read/write pointer
- [ ] ftruncate — Truncates a file to a given length
- [ ] fwrite — Binary-safe file write
- [ ] glob — Find pathnames matching a pattern
- [ ] is_dir — Tells whether the filename is a directory
- [ ] is_executable — Tells whether the filename is executable
- [ ] is_file — Tells whether the filename is a regular file
- [ ] is_link — Tells whether the filename is a symbolic link
- [ ] is_readable — Tells whether a file exists and is readable
- [ ] is_uploaded_file — Tells whether the file was uploaded via HTTP POST
- [ ] is_writable — Tells whether the filename is writable
- [ ] is_writeable — Alias of is_writable
- [ ] lchgrp — Changes group ownership of symlink
- [ ] lchown — Changes user ownership of symlink
- [ ] link — Create a hard link
- [ ] linkinfo — Gets information about a link
- [ ] lstat — Gives information about a file or symbolic link
- [ ] mkdir — Makes directory
- [ ] move_uploaded_file — Moves an uploaded file to a new location
- [ ] parse_ini_file — Parse a configuration file
- [ ] parse_ini_string — Parse a configuration string
- [ ] pathinfo — Returns information about a file path
- [ ] pclose — Closes process file pointer
- [ ] popen — Opens process file pointer
- [ ] readfile — Outputs a file
- [ ] readlink — Returns the target of a symbolic link
- [ ] realpath_cache_get — Get realpath cache entries
- [ ] realpath_cache_size — Get realpath cache size
- [ ] realpath — Returns canonicalized absolute pathname
- [ ] rename — Renames a file or directory
- [ ] rewind — Rewind the position of a file pointer
- [ ] rmdir — Removes directory
- [ ] set_file_buffer — Alias of stream_set_write_buffer
- [ ] stat — Gives information about a file
- [ ] symlink — Creates a symbolic link
- [ ] tempnam — Create file with unique file name
- [ ] tmpfile — Creates a temporary file
- [ ] touch — Sets access and modification time of file
- [ ] umask — Changes the current umask
- [ ] unlink — Deletes a file


