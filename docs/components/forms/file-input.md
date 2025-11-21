# Form File Input Component

File upload input fields.

## Component Location

**File Path:** `resources/views/components/ui/form/file-input.blade.php`

## Features

- 2 size option (base, lg)
- 3 variant (default, dropzone, dropzone-button)
- Validation states (error, success)
- Helper text support
- Multiple file upload
- File type restrictions (accept)
- Required field indicator
- Dark mode support
- Livewire integration

## Usage Examples

### Default File Input

```blade
<x-ui::form.file-input
    label="Upload Document"
    name="document"
    helper="PDF, DOC, or DOCX (MAX. 10MB)"
    :required="true"
    wire:model="document"
/>
```

### With Error

```blade
<x-ui::form.file-input
    label="Upload Photo"
    name="photo"
    accept="image/*"
    :error="$errors->first('photo')"
    wire:model="photo"
/>
```

### Multiple Files

```blade
<x-ui::form.file-input
    label="Upload Photos"
    name="photos[]"
    :multiple="true"
    accept="image/*"
    helper="You can select multiple images"
    wire:model="photos"
/>
```

### Large Size

```blade
<x-ui::form.file-input
    label="Upload File"
    name="file"
    size="lg"
    wire:model="file"
/>
```

### Dropzone Variant

```blade
<x-ui::form.file-input
    label="Upload Images"
    name="images"
    variant="dropzone"
    :multiple="true"
    accept="image/*"
    helper="SVG, PNG, JPG or GIF (MAX. 800x400px)"
    wire:model="images"
/>
```

### Dropzone with Button

```blade
<x-ui::form.file-input
    label="Upload Documents"
    name="documents"
    variant="dropzone-button"
    :multiple="true"
    accept=".pdf,.doc,.docx"
    helper="PDF, DOC or DOCX files only"
    wire:model="documents"
/>
```

### With Success Message

```blade
<x-ui::form.file-input
    label="Upload Avatar"
    name="avatar"
    accept="image/*"
    success="File uploaded successfully!"
    wire:model="avatar"
/>
```

### Specific File Types

```blade
{{-- Video Files --}}
<x-ui::form.file-input
    label="Upload Video"
    name="video"
    accept="video/*"
    helper="MP4, AVI, or MOV format"
    wire:model="video"
/>

{{-- PDF Only --}}
<x-ui::form.file-input
    label="Upload PDF"
    name="pdf"
    accept=".pdf"
    helper="PDF files only"
    wire:model="pdf"
/>

{{-- Specific Image Types --}}
<x-ui::form.file-input
    label="Upload Images"
    name="images"
    accept="image/png,image/jpeg,image/gif"
    helper="PNG, JPEG, or GIF files"
    wire:model="images"
/>
```

## Real-World Examples

### Document Upload Form

```blade
<form wire:submit.prevent="uploadDocument">
    <x-ui::form.file-input
        label="Upload Contract"
        name="contract"
        accept=".pdf,.doc,.docx"
        helper="Supported formats: PDF, DOC, DOCX (MAX. 5MB)"
        :required="true"
        :error="$errors->first('contract')"
        wire:model="contract"
    />

    <button type="submit" class="mt-4 px-4 py-2 bg-blue-600 text-white rounded-lg">
        Upload Document
    </button>
</form>
```

### Image Gallery Upload

```blade
<x-ui::form.file-input
    label="Add Photos to Gallery"
    name="gallery_photos[]"
    variant="dropzone-button"
    :multiple="true"
    accept="image/png,image/jpeg,image/jpg"
    helper="Drag and drop images or click to browse. Multiple files allowed."
    wire:model="galleryPhotos"
    :error="$errors->first('galleryPhotos')"
/>
```

### Profile Picture Upload

```blade
<x-ui::form.file-input
    label="Profile Picture"
    name="avatar"
    variant="dropzone"
    accept="image/*"
    helper="Square image recommended (MAX. 2MB)"
    wire:model="avatar"
    :error="$errors->first('avatar')"
/>
```

## Props Table

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `label` | string | optional | Label text |
| `name` | string | **required** | Input name attribute |
| `size` | string | 'base' | Size: base, lg |
| `variant` | string | 'default' | Variant: default, dropzone, dropzone-button |
| `helper` | string | optional | Helper text |
| `error` | string | optional | Error message (red color) |
| `success` | string | optional | Success message (green color) |
| `multiple` | boolean | false | Can multiple files be selected? |
| `accept` | string | optional | Allowed file types |
| `required` | boolean | false | Required field indicator |

## Variants

### Default
Standard file input button

### Dropzone
Drag & drop area (with dashed border)

### Dropzone-Button
Enhanced appearance with dropzone + browse button

## File Type Examples

```blade
{{-- Images --}}
accept="image/*"
accept="image/png,image/jpeg,image/gif"

{{-- Documents --}}
accept=".pdf,.doc,.docx"
accept="application/pdf,application/msword"

{{-- Videos --}}
accept="video/*"
accept="video/mp4,video/avi"

{{-- Audio --}}
accept="audio/*"
accept="audio/mp3,audio/wav"

{{-- Spreadsheets --}}
accept=".xlsx,.xls,.csv"

{{-- Archives --}}
accept=".zip,.rar,.7z"
```

## Validation Examples

### With Livewire Validation

```blade
<x-ui::form.file-input
    label="Upload Resume"
    name="resume"
    accept=".pdf,.doc,.docx"
    helper="PDF or Word document (MAX. 5MB)"
    :required="true"
    :error="$errors->first('resume')"
    wire:model="resume"
/>

{{-- In Livewire Component --}}
public $resume;

protected $rules = [
    'resume' => 'required|file|mimes:pdf,doc,docx|max:5120', // 5MB
];
```

## Livewire Integration

### Basic Integration

```blade
<x-ui::form.file-input
    label="Upload File"
    name="file"
    wire:model="file"
/>
```

### With Preview

```blade
<x-ui::form.file-input
    label="Upload Image"
    name="image"
    accept="image/*"
    wire:model="image"
/>

@if ($image)
    <div class="mt-4">
        <img src="{{ $image->temporaryUrl() }}" alt="Preview" class="w-32 h-32 object-cover rounded">
    </div>
@endif
```

### Multiple Files with Preview

```blade
<x-ui::form.file-input
    label="Upload Images"
    name="images[]"
    :multiple="true"
    accept="image/*"
    wire:model="images"
/>

@if ($images)
    <div class="mt-4 grid grid-cols-4 gap-4">
        @foreach ($images as $image)
            <img src="{{ $image->temporaryUrl() }}" alt="Preview" class="w-full h-32 object-cover rounded">
        @endforeach
    </div>
@endif
```

## Best Practices

1. **Specify file types** - Use `accept` attribute to limit file types
2. **Set size limits** - Validate file sizes on server side
3. **Provide clear helpers** - Explain accepted formats and size limits
4. **Show upload progress** - Use Livewire loading states for file uploads
5. **Display previews** - Show image previews for uploaded files
6. **Handle errors** - Provide clear error messages for invalid files
7. **Use dropzone for images** - Better UX for image uploads
8. **Multiple files wisely** - Only allow multiple files when necessary
9. **Validate on server** - Always validate file types and sizes on server
10. **Clean up temp files** - Ensure temporary files are cleaned up

## Notes

- Livewire handles temporary file storage automatically
- Use `temporaryUrl()` method for image previews
- File validation should always be done on server side
- `accept` attribute provides client-side filtering but is not secure
- Dropzone variants provide better UX for drag-and-drop
- Multiple file uploads require array syntax `name="files[]"`
- Consider using dedicated file upload libraries for complex requirements
- Always set maximum file size limits
- Provide feedback during file upload (loading states)
- Clean up old temporary files regularly