import re


def findGeneralizingSentences(text) -> list:
    general_words = ["всяк", "все", "кажд", "все эти", "все виды", "разн"]

    sentences = re.split(r"(?<=\w[.!?])\s+", text)

    generalizing_sentences = []

    for sentence in sentences:
        if any(word in sentence.lower() for word in general_words):
            if re.search(r"[:—-]", sentence):
                generalizing_sentences.append(sentence)
            elif "," in sentence:
                generalizing_sentences.append(sentence)

    return generalizing_sentences


text = """
Всякий день стал приносить старый Мосеич разную крупную рыбу: щук, язей, голавлей, линей, окуней.
Обратная сторона ситуации: вычислительные мощности продолжают дешеветь.
Все предметы были на месте: тетради, ручки, карандаши, учебники.
Каждый день мы видели всё больше машин на дорогах – грузовики, легковые автомобили, автобусы.
Но отказаться от паролей в большинстве случаев пока не получается.
"""

generalizing_sentences = findGeneralizingSentences(text)
for sentence in generalizing_sentences:
    print(sentence)
