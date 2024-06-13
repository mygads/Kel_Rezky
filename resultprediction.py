import sys
import pandas as pd
import joblib
from sklearn.preprocessing import StandardScaler
from sklearn.metrics import accuracy_score, classification_report

if len(sys.argv) < 4:
    print("Usage: tes.py <filename> <model_file> <scaler_file>")
    sys.exit(1)

# Ambil nama file dari argumen command line
filename = r"uploads\1.csv"
model_file = sys.argv[2]
scaler_file = sys.argv[3]

# Load dataset
df = pd.read_csv(filename)

# Load model and scaler
model = joblib.load(model_file)
scaler = joblib.load(scaler_file)

# Feature scaling
features = df[df.columns[0:12]]
scaled_features = scaler.transform(features)
label = df['DEATH_EVENT']

# Prediction
result = model.predict(scaled_features)

# Save result to CSV
hasil = pd.DataFrame(result, columns=['Prediction'])
hasil.to_csv(r'hasil\hasil.csv', index=False)

# Print accuracy and classification report
print(f'Accuracy: {accuracy_score(label, result):.2f}')
print('Classification Report:')
print(classification_report(label, result))
