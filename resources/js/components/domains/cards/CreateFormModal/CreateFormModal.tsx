import React, { useState } from 'react';
import styles from './CreateFormModal.module.scss';
import UiModal from '@/components/uis/UiModal';
import UiSelectBox from '@/components/uis/UiSelectBox';
import useForm from '@/components/hooks/useForm';

interface CreateFormModalProps {
  cardUrl: string;
  closeModal: () => void;
  conditions: {
    packs?: { [key: string]: string };
    cardRarities?: { [key: string]: string };
    cardTypes?: { [key: string]: string };
    cardRules?: { [key: string]: string };
    pokemonTypes?: { [key: string]: string };
  };
}

const CreateFormModal: React.FC<CreateFormModalProps> = ({
  cardUrl,
  closeModal,
  conditions = {},
}) => {
  const { formData, handleChange, resetForm } = useForm({
    initialValues: {
      packId: '',
      name: '',
      cardRealityId: '',
      cardTypeId: '',
      cardRuleId: '',
      pokemonTypeId: '',
      imageUrl: cardUrl, // 初期値としてカード画像URLを設定
    },
  });

  const closeButton = () => {
    closeModal();
    resetForm();
  };

  const handleSubmit = async (e: React.FormEvent) => {
    e.preventDefault();

    try {
      const csrfToken = (document.querySelector('meta[name="csrf-token"]') as HTMLMetaElement)?.content;

      if (!csrfToken) {
        throw new Error('CSRF token is missing.');
      }

      // 送信データにimageUrlを含める
      const dataToSubmit = { ...formData, imageUrl: cardUrl };

      const response = await fetch('/api/cards', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': csrfToken,
        },
        body: JSON.stringify(dataToSubmit),
      });

      if (response.ok) {
        console.log('カードが正常に登録されました');
        resetForm();
      } else {
        console.error('登録に失敗しました');
      }
    } catch (error) {
      console.error('エラー:', error);
    }
  };

  const convertConditionsToArray = (conditions: Record<string, string>) => {
    return Object.entries(conditions).map(([id, name]) => ({
      id: Number(id),
      name,
    }));
  };

  const packsArray = convertConditionsToArray(conditions.packs).reverse();
  const raritiesArray = convertConditionsToArray(conditions.cardRarities);
  const cardTypesArray = convertConditionsToArray(conditions.cardTypes);
  const cardRulesArray = convertConditionsToArray(conditions.cardRules);
  const pokemonTypesArray = convertConditionsToArray(conditions.pokemonTypes);

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
                  onChange={handleChange}
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
                  onChange={handleChange}
                  className={styles.formControl}
                />
              </label>
            </div>
            <div className={styles.formGroup}>
              <label className={styles.formLabel}>
                レア度を選択:
                <UiSelectBox
                  name="cardRealityId"
                  value={formData.cardRealityId}
                  onChange={handleChange}
                  options={raritiesArray}
                  canNull={false}
                  placeholder="レア度を選択してください"
                />
              </label>
            </div>
            <div className={styles.formGroup}>
              <label className={styles.formLabel}>
                カード種類を選択:
                <UiSelectBox
                  name="cardTypeId"
                  value={formData.cardTypeId}
                  onChange={handleChange}
                  options={cardTypesArray}
                  canNull={false}
                  placeholder="カード種類を選択してください"
                />
              </label>
            </div>
            <div className={styles.formGroup}>
              <label className={styles.formLabel}>
                カードルールを選択:
                <UiSelectBox
                  name="cardRuleId"
                  value={formData.cardRuleId}
                  onChange={handleChange}
                  options={cardRulesArray}
                  canNull={false}
                  placeholder="カードルールを選択してください"
                />
              </label>
            </div>
            <div className={styles.formGroup}>
              <label className={styles.formLabel}>
                ポケモンタイプを選択:
                <UiSelectBox
                  name="pokemonTypeId"
                  value={formData.pokemonTypeId}
                  onChange={handleChange}
                  options={pokemonTypesArray}
                  canNull={false}
                  placeholder="ポケモンタイプを選択してください"
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
