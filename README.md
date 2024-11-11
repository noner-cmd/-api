# Tarot Card Drawing API

This project is a simple PHP-based API for drawing tarot cards, displaying card images, and providing explanations. The API randomly selects a tarot card, determines if it is upright or reversed, and returns the corresponding image URL and explanation.

## Features
- Randomly selects a tarot card from a deck (0 to 21).
- Randomly determines if the card is upright or reversed.
- Returns a JSON response containing the card number, orientation, image URL, and explanation.
- Provides formatted JSON output for easy readability.

## Setup and Installation

1. **Place the files in your web server directory**:
   Ensure all PHP files, tarot card images (`0.jpg` to `21.jpg`), and explanation text files (`1.txt` for upright explanations and `2.txt` for reversed explanations) are in the `wwwroot` directory or the root of your web server.

2. **Enable PHP GD Library**:
   The script requires the PHP GD library for image manipulation. Ensure it is enabled in your PHP environment.

3. **Run the API**:
   Access the API via a web browser or an HTTP client by navigating to:
   ```
   http://your-domain.com/your-api-file.php/draw-tarot
   ```

## API Response Format

The API returns a JSON response in the following format:

```json
{
  "card_number": 5,
  "orientation": "upright",
  "image_url": "http://your-domain.com/5.jpg",
  "explanation": "This is the explanation for the selected tarot card."
}
```

## Customization

- **Images**: Make sure the images are named `0.jpg` to `21.jpg` and are placed in the same directory as the PHP script.
- **Explanations**: The `1.txt` and `2.txt` files should have 22 lines each, corresponding to each card (0 to 21). Adjust the text content as needed.

## Example Usage

To test the API, simply make a GET request:

```bash
curl http://your-domain.com/your-api-file.php/draw-tarot
```

## License
This project is open-source and available under the [MIT License](LICENSE).

## Contributions
Feel free to submit issues or pull requests to improve the project.
