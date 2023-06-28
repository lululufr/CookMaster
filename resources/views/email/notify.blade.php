<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Message</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
<div class="max-w-xl mx-auto py-12">
    <div class="bg-white shadow-lg rounded-lg px-6 py-8">
        <h1 class="text-2xl font-semibold mb-6">Send Message to Client</h1>
        <form>
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium mb-2">Client Name</label>
                <input type="text" id="name" name="name" placeholder="Enter client's name"
                       class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium mb-2">Client Email</label>
                <input type="email" id="email" name="email" placeholder="Enter client's email address"
                       class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="message" class="block text-gray-700 font-medium mb-2">Message</label>
                <textarea id="message" name="message" rows="4" placeholder="Enter your message"
                          class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500"></textarea>
            </div>
            <button type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-200">Send
                Message</button>
        </form>
    </div>
</div>
</body>

</html>
