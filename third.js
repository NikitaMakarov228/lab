function extractDirectSpeech(text) {
  const pattern = /["“”']([^"“”']+)["“”']|(?:^|\n)\s*-\s*([^\n]+)/g;
  let matches;
  const directSpeech = [];

  // exec для поочередного поиска всех совпадений
  while ((matches = pattern.exec(text)) !== null) {
    directSpeech.push(matches[1] ? matches[1] : matches[2]);
  }

  return directSpeech;
}

const text = `Он сказал: "Привет! Как дела?". 
Она ответила: "Все хорошо, спасибо!" и добавила:
- Я рада тебя видеть!
- Как ты сам?`;

const directSpeechFragments = extractDirectSpeech(text);

directSpeechFragments.forEach((speech, index) => {
  console.log(`${index + 1}. ${speech.trim()}`);
});
