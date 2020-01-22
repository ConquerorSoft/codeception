# Demo app for using Codeception

This is a demo to demonstrate how to use Codeception for unit, functional and acceptance testing for my talk at SunshinePHP 2020

## Requirements

We need a functionality that does the following:

- Encode a plain text string
- Decode an encoded string

### Conditions

- Only the following characters are accepted in plain text: [a-z\s]
- Characters should be converted by an equivalent character based on this:
  - from: "abcdefghijklmnopqrstuvwxyz"
  - to:   "åÅçı´ƒ©˙ˆÇ˚¬µ˜øπœ®ßÎ¨¡ÏÓ¥Ω"
  - from: single space
  - to: double space

### Examples

- For plain strings converted to encoded version:
  - 'some string' becomes 'ßøµ´  ßÎ®ˆ˜©'
  - 'valid string' becomes '¡å¬ˆı  ßÎ®ˆ˜©'
  - 'christian varela' becomes 'ç˙®ˆßÎˆå˜  ¡å®´¬å'
- For encoded strings converted to plain versions:
  - 'πåßßÏø®ı' becomes 'password'
  - '¥å˜©' becomes 'yang'
  - '¥ˆ˜' becomes 'yin'

### Assumptions

- Numbers are not considered.
  - True
- '\s' translates to spaces, tabs, EOL.
  - False, it only applies to spaces
- Special characters are not considered.
  - True

### Questions

- What is the expected result for when a not valid string is given when encoding / decoding?
  - Throw an exception with message: "Invalid input"
- Should we consider filtering in / escaping out?
  - No, let's leave that to the consumers.
- Should we validate the strings for encoding / decoding?
  - Yes
- Is there a limit for the size of the input string when encoding / decoding?
  - Yes, the maximum size should be 64 characters.
  - Throw an exception with message "Exceeded Size" if the limit is exceeded.
- What's the interface of interaction for the application?
  - command line?
    - No
  - web application?
    - Yes
  - API?
    - No
  - Library?
    - No

### Logical solution

- There will be a function to encode a plain text
  - It will receive a plain text string
  - It will validate the given string
  - It will encode the string to match all the characters from the encoding strategy
  - It will return the encoded string
- There will be a function to decode an encoded text
  - It will receive an encoded string
  - It will validate the given string
  - It will decode matching the transformation code
  - It will return the decoded string

### Technical solution

- There will be a "StringTransformation" class
  - with "conquerorsoft\codeception" namespace
  - under "/src" directory
  - with a "public" "encode" method
    - that receives
      - a "string" string
    - that will return
      - an "encoded" string
  - with a "public" "decode" method
    - that receives
      - an "encoded" string
    - that will return
      - a "decoded" string
- There will be an "index.php" file
  - with an HTML with:
    - a title: "String transformation"
    - a form with:
      - a "Plain String" text input
      - an "Encode" button
    - a form with:
      - a "Encoded String" text input
      - a "Decode" button

### Process description

- A 'some example' string needs to be encoded
  - The encode method is called to encode the string
  - The 'ßøµ´  ´Óåµπ¬´' string is returned
- A 'ß¨˜ß˙ˆ˜´π˙π' encoded string needs to be decoded
  - The decode method is called to decode the string
  - The 'sunshinephp' string is returned
