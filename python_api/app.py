from flask import Flask, request, jsonify
import pandas as pd
import nltk
from nltk.tokenize import word_tokenize
from nltk.corpus import stopwords
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.naive_bayes import MultinomialNB
from sklearn.pipeline import Pipeline
import pickle

nltk.download('punkt')
nltk.download('stopwords')

app = Flask(__name__)

# Load data from CSV file
data = pd.read_csv('quell.csv')
data['Heavy'] = pd.to_numeric(data['Heavy'].str.replace(' Kg', ''), errors='coerce')
data = data.dropna(subset=['Heavy'])

def process_text(text):
    tokens = word_tokenize(text)
    tokens = [word.lower() for word in tokens if word.isalpha()]
    tokens = [word for word in tokens if word not in stopwords.words('indonesian')]
    return ' '.join(tokens)

# Training data for classification
training_data = [
    ("Laptop untuk keperluan kantor dengan daya tahan baterai yang lama.", "Ringan"),
    ("Laptop untuk gaming dengan performa tinggi.", "Berat"),
    ("Laptop untuk desain grafis dengan kinerja tinggi.", "Berat"),
    ("Laptop untuk sekolah atau kuliah, ringan dan mudah dibawa.", "Ringan"),
    ("Laptop untuk programming dengan spesifikasi tinggi.", "Berat"),
    ("Laptop untuk presentasi dengan layar sentuh.", "Sedang"),
    ("Laptop untuk hiburan di rumah dengan audio dan visual yang bagus.", "Sedang"),
    ("Laptop untuk mobilitas tinggi dengan desain ramping.", "Ringan")
]

pipeline = Pipeline([
    ('tfidf', TfidfVectorizer(tokenizer=process_text)),
    ('clf', MultinomialNB())
])

pipeline.fit([data[0] for data in training_data], [data[1] for data in training_data])

@app.route('/recommend', methods=['POST'])
def recommend_laptop():
    description = request.json['description']
    processed_description = process_text(description)
    predicted_category = pipeline.predict([processed_description])[0]

    if predicted_category == "Ringan":
        max_weight = 1.5
        recommended_laptops = data[data['Heavy'] <= max_weight]
    elif predicted_category == "Sedang":
        min_weight = 1.5
        max_weight = 2.5
        recommended_laptops = data[(data['Heavy'] > min_weight) & (data['Heavy'] <= max_weight)]
    else:
        min_weight = 2.5
        recommended_laptops = data[data['Heavy'] > min_weight]

    result = recommended_laptops[['Nama Laptop', 'Processor', 'Graphic Card', 'RAM', 'OS', 'Harga', 'Panel layar', 'Refresh rate', 'Heavy']].to_dict(orient='records')

    return jsonify(result)

if __name__ == '__main__':
    app.run(debug=True)
