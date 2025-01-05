import React, { useState } from 'react';
import styles from './CreateFormModal.module.scss'; // CSSモジュールのインポート
import UiModal from '@/components/uis/UiModal';
import UiSelectBox from '@/components/uis/UiSelectBox';

interface CreateFormModalProps {
  cardUrl: string;
  closeModal: () => void;
  conditions: {
    packs: { [key: string]: string };
  };
}

const CreateFormModal: React.FC<CreateFormModalProps> = ({
  cardUrl,
  closeModal,
  conditions,
}) => {
  const [selectedCard, setSelectedCard] = useState<string | null>(null);
  const [formData, setFormData] = useState({
    packId: '',
    name: '',
    reality: '',
  });

  const closeButton = () => {
    closeModal();
    setSelectedCard(null);
    setFormData({ packId: '', name: '', reality: '' }); // フォームをリセット
  };

  const handleInputChange = (e: React.ChangeEvent<HTMLInputElement | HTMLSelectElement>) => {
    const { name, value } = e.target;
    setFormData((prevData) => ({ ...prevData, [name]: value }));
  };

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    console.log('登録データ:', { ...formData, card: selectedCard });
    closeModal();
  };

  const packsArray = Object.entries(conditions.packs)
  .reverse() // 逆順にする
  .map(([id, name]) => ({
    id: Number(id), // idをnumber型に変換
    name,
  }));

  return (
    <UiModal onClose={closeButton}>
      <div className={styles.modalContent}>
        <div className={styles.modalCardContainer}>
          <img src={cardUrl} alt="Selected" className={styles.modalCard} />
        </div>
        <div className={styles.modalFormContainer}>
          <form onSubmit={handleSubmit}>
            <div className={styles.formGroup}>
              <label className={styles.formLabel}>
                パックを選択:
                <UiSelectBox
                  name="packId"
                  value={formData.packId}
                  onChange={handleInputChange}
                  options={packsArray}
                  canNull={false}
                  placeholder="パックを選択してください"
                />
              </label>
            </div>
            <div className={styles.formGroup}>
              <label className={styles.formLabel}>
                カード名:
                <input
                  type="text"
                  name="name"
                  value={formData.name}
                  onChange={handleInputChange}
                  className={styles.formControl}
                />
              </label>
            </div>
            <div className={styles.formGroup}>
              <label className={styles.formLabel}>
                レアリティ:
                <input
                  type="text"
                  name="reality"
                  value={formData.reality}
                  onChange={handleInputChange}
                  className={styles.formControl}
                />
              </label>
            </div>
            <button type="submit" className={styles.submitButton}>
              登録
            </button>
          </form>
        </div>
      </div>
    </UiModal>
  );
};

export default CreateFormModal;
